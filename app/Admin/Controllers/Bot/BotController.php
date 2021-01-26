<?php

namespace App\Admin\Controllers\Bot;

use App\Admin\Controllers\Controller;
use App\Admin\Models\Bot\Bot;
use App\Admin\Models\Bot\WechatGroup;
use App\Admin\Models\Bot\WechatMessage;
use App\Admin\Services\Bot\BotService;
use Illuminate\Http\Request;


require public_path().'\interface.php';

class BotController extends Controller
{
    /**
     * 同步群列表
     * @param Request $request
     * @param BotService $service
     * @param Bot $botM
     * @return \Illuminate\Http\JsonResponse
     */
    public function syncGroup(Request $request,BotService $service, Bot $botM){
        //取bot
        $robwxid = $request->get('robwxid',"");

        if( $robwxid != ""){
            $botList = $botM->where('robwxid',$robwxid)->where('status',BOT::BOT_ONLINE)->get();
        }else{
            $botList = $botM->where('status',BOT::BOT_ONLINE)->get();
        }
        $res = $service->syncGroup($botList);

        return $this->ok($res);
    }

    /**
     * 获取微信信息
     * @param Request $request
     * @param WechatMessage $model
     * @param BotService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWechatMessage(Request $request,WechatMessage $model,BotService $service)
    {
        date_default_timezone_set('PRC');
        $type = $_POST['type'];
        $msg_type = $_POST['msg_type'];
        $from_wxid = $_POST['from_wxid'];
        $nickname  = urldecode($_POST['from_name']);  // 昵称会出现中文，需要转码
        $final_from_wxid = $_POST['final_from_wxid'];
        $final_from_name = urldecode($_POST['final_from_name']);
        $robwxid   = $_POST['robot_wxid'];
//        $file_url  = urldecode($_POST['file_url']);
        $msg  = urldecode($_POST['msg']);
        $time = $_POST['time'];

        $data = [
            'type'=>$type,
            'msg_type'=>$msg_type,
            'from_wxid'=>$from_wxid,
            'nickname'=>$nickname,
            'final_from_wxid'=>$final_from_wxid,
            'final_from_name'=>$final_from_name,
            'robwxid'=>$robwxid,
            'msg'=>$msg,
            'created_at'=>$time,
//            'file_url'=>$file_url,
        ];

        $model->fill($data);
        $model->save();

        //回复信息
        $res = $service->replyMessage($msg,$type,$robwxid, $from_wxid);

        return $this->ok();
    }


}
