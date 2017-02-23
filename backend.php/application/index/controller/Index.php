<?php
namespace app\index\controller;

use app\index\model\Test;
use think\Validate;
use think\mb_strlen;

class Index
{
    public function index()
    {
        $t = new Test;
        $t->name = "asdf";
        $t->save();
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    public function date(){
        $t = Test::get(1);
        $t->name = "asdf";
        $t->save();
//        Test::destroy([1,2,3]);
        return json(dump($t->toArray()));
    }

    public function getArr(){
        $validate = new Validate([
            'name'  => 'require',
            'email' => 'email'
        ]);
        $data = [
            'name'  => '',
            'email' => 'thinkphp@qq.com'
        ];
        if (!$validate->check($data)) {
            dump($validate->getError());
        }
        return json(array(
           1 => "asdf",
            2 => "asdf",
            3=>   ( (0.1+0.7) * 10 ),
            true=>1
        ));
    }
}
