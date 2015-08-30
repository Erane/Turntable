<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/30
 * Time: 13:22
 */

header("Content-type:application/json;charset=utf-8");
header("Access-Control-Allow-Origin:*");
header("Cache-Control:max-age=0");

//奖品总类
$category=6;

//幸运数字
$luckyNum=1;

//每个奖品中奖的概率 1/(x+1)
$probability=array(
    2,  //5粒豆芽
    3,  //10粒豆芽
    3,  //5元Q币
    4,  //3天F码
    4,  //免邮劵
    8   //惊喜礼包
);
//对应奖品的名字
$prizeName=array(
    "5粒豆芽",
    "10粒豆芽",
    "5元Q币",
    "3天F码",
    "免邮劵",
    "惊喜礼包",
);
//每个奖品所对应前端的下标
$prizecode=array(
    5,  //5粒豆芽
    8,  //10粒豆芽
    1,  //5元Q币
    2,  //3天F码
    4,  //免邮劵
    6   //惊喜礼包
);
// 从0-5之间随机获取一个整数 该值将会对应所要抽取的奖品
$caterandom=mt_rand(0,$category-1);
//在对应奖品概率中随机抽取一个整数
$random=mt_rand(0,$probability[$caterandom]);

//判断抽取的整数是否相等于预先设置号的幸运数字
if($random === $luckyNum){
    $data=array(
        $prizeName[$caterandom],//获取奖品对应的名称
        $prizecode[$caterandom] //获取奖品在前端对应的data值
    );
    echo json_encode($data);//以json格式输出到前端
}else{
    $data=array(
        "好可惜,再来一次吧!",
        3
    );
    echo json_encode($data);
}