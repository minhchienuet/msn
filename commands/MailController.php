<?php
/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 5/12/16
 * Time: 10:02 PM
 */

namespace app\commands;

use yii\console\Controller;

class MailController extends Controller
{
    public function  actionIndex()
    {


        \Yii::$app->mailer->compose()
            ->setTo('chienntm249@gmail.com')
            ->setFrom(['msn.air.uet@gmail.com' =>'MSN'])
            ->setSubject('Cảnh báo ô nhiễm không khí')
            ->setHtmlBody("<h3 class='text-danger'>Hệ thống MSN gửi bạn cảnh báo về chất lượng không khí tại khu vực Cầu Giấy - Dịch Vọng Hậu như sau:</h3><br>"
            ."<h4 class='text-info'>- Chỉ số AQI: <b>230</b></h4><br/>"
            ."<h4 class='text-info'>- Mức ảnh hưởng: <b>4/5</b></h4><br/>"
            ."<h4 class='text-info'>- Mức độ này có nghĩa chất lượng không khí tại khu vực này <b>Xấu<b></h4><br/>"
            ."<h4 class='text-info'><b>- Gây ảnh hưởng đến sức khỏe của mọi người.<b/></h4>")
            ->send();
    }
} 