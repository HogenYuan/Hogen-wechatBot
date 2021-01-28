<?php

namespace App\Admin\Services;

use Illuminate\Support\Facades\Log;

abstract class BaseService
{
    public $error = null;

    /**
     * 更新冗余数据
     *
     * @param array $updates
     * @param array $defaultColumns
     * @param mixed $whereValue
     * @param mixed $updateValue
     *
     * @return int
     */
    protected static function updateRedundantData(
        array $updates,
        array $defaultColumns,
        $whereValue,
        $updateValue
    ): int {
        $updateCount = 0;
        foreach ($updates as $className => $columns) {
            // 采用默认值
            if (is_numeric($className)) {
                $className = $columns;
                $columns   = $defaultColumns;
            }

            $tableName = (new $className)->getTable();
            foreach ($columns as $whereColumn => $updateColumn) {
                $updateCount += \DB::table($tableName)->where($whereColumn,
                    $whereValue)->update([$updateColumn => $updateValue]);
            }
        }

        return $updateCount;
    }

    public function getError()
    {
        return $this->error;
    }

    /**
     * 更新
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array                               $data
     * @param string                              $key
     *
     * @return bool
     */
    public function saveOrUpdateOrDel(\Illuminate\Database\Eloquent\Model $model, array $data, string $key): bool
    {
        $filterData = $data;

        $oldList = $model->select($key)->get();
        //更新
        $idList     = array_column($filterData, $key);
        $oldIdList  = array_column($oldList, $key);
        $insertList = array_diff($idList, $oldIdList);
        $updateList = array_intersect($idList, $oldIdList);
        $delList    = array_diff($oldIdList, $idList);
        try {
            $insertData = [];
            foreach ($insertList as $k => $v) {
                $insertData[] = $filterData[$k];
            }
            if (!empty($insertData)) {
                $model->save($insertData);
            }
            foreach ($updateList as $k => $v) {
                $filterData[$k]['gmt_modified'] = date('Y-m-d H:i:s');
                $model->where($key, $v)->update($filterData[$k]);
            }
            foreach ($delList as $k => $v) {
                $model->where([$key => $v])->delete();
            }
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            $this->_errLog(__FUNCTION__, $e->getMessage(), '更新数据失败');
            return false;
        }
        return true;
    }

    /**
     * 打印错误日志
     *
     * @param string $func
     * @param        $data
     * @param string $msg
     */
    protected
    function _errLog(
        string $func = '',
        $data = [],
        string $msg = ''
    ) {
//        if (is_array($data)) {
//            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
//        }
        Log::error("BotErr", [
            'func' => $func,
            'data' => $data,
            'msg'  => $msg,
        ]);
    }

    /**
     * 调取接口
     *
     * @param string $url
     * @param string $postContent
     *
     * @return bool|string
     */
    protected function _curl(string $url, $thisHeader)
    {
        $ch = curl_init($url);

//        $thisHeader = [
//            'Content-Type: application/json',
//            'Content-Length: ' . strlen($postContent),
//        ];

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $thisHeader);
        curl_setopt($ch, CURLOPT_ENCODING, '');
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $postContent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->_cookieJar);
        curl_setopt($ch, CURLOPT_TIMEOUT, 500);

        //最多循环三次
        $requestCount = 1;
//        $return['header'] = $thisHeader;
//        $return['org'] = $postContent;
        while ($requestCount <= 3) {
            //执行请求
            $return['result'] = curl_exec($ch);

            //curl是否发生错误
            if ($errNo = curl_errno($ch)) {
                $return['ack']       = false;
                $return['errorType'] = 'Internalc Error';
                $return['errorCode'] = 500;
                $return['message']   = 'K3cloud CurlRequestError,ErrNo:' . $errNo . ',Error:' . curl_error($ch);
            } else {
                $return['ack']     = true;
                $return['message'] = 'success';
                break;
            }
            //请求次数累加
            $requestCount++;
        }
        curl_close($ch);

//        if (!$return['ack']) {
//            Log::error
//            WkLog::info("金蝶K3——CURL-ERROR:".json_encode($return));
//            throw new K3cloudException($return);
//        }

        return $return;
    }

}