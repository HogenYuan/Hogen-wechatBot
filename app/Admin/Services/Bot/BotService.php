<?php

namespace App\Admin\Services\Bot;

use App\Admin\Models\Bot\WechatGroup;
use App\Admin\Models\Bot\WechatMessage;
use App\Admin\Services\BaseService;

class BotService extends BaseService
{
    const NOTICE   = '上新啦上新啦';
    const SEND_URL = 'http://127.0.0.1:8073/send';

    /**
     * 同步群列表
     *
     * @param $botList
     *
     * @return bool
     */
    public function syncGroup($botList)
    {
        $data = [];
        foreach ($botList as $bot) {
            $groupList = get_group_list($bot['robwxid'], 1);
            if (!empty($groupList)) {
                foreach ($groupList as $group) {
                    $data[] = [
                        'wxid'     => $group['wxid'],
                        'nickname' => $group['nickname'],
                        'robwxid'  => $group['robot_wxid'],
                        'bid'      => $bot['bid'],
                        'status'   => WechatGroup::GROUP_NORMAL,
                    ];
                }
            }
        }
        $this->saveOrUpdateOrDel(new WechatGroup(), $data, 'wxid');
        return true;
    }

    /**
     * 修改群公告
     *
     * @return array|string|null
     */
    public function modifyGroupNotice($robwxid, $groupWxid, $notice)
    {
//        $robwxid = 'wxid_0upwmu2g86pq22';
//        $groupWxid = '25495948319@chatroom';
//        $notice = '上新啦上新啦';
        $res = modify_group_notice($robwxid, $groupWxid, $notice);
        return $res;
    }

    /**
     * 回复信息
     *
     * @param $msg
     * @param $type
     * @param $robwxid
     * @param $from_wxid
     *
     * @return array|string|null
     */
    public function replyMessage($msg, $type, $robwxid, $from_wxid)
    {
        $res = null;
        if ($type == WechatMessage::MESSAGE_TYPE_GROUP) {
        }

        //判断用户发来的关键词
        if ($msg == 'test') {
            // 自己的逻辑处理
            $reply = '@所有人 测试a人';
            $res   = send_text_msg($robwxid, $from_wxid, $reply);
        }
        return $res;
    }
}
