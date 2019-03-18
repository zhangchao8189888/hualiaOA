<?php
return array(
	'memu'  => array(

        '1' => array(
            'controller' => 'customer',
            'resource'   => '客户管理',
            'icon'		 =>	'envelope-alt',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'customerList',
                    'resource'	=> '单位列表',
                ),
            ),
        ),
        '2' => array(
            'controller' => 'product',//
            'resource'   => '产品管理',
            'icon'		 =>	'envelope-alt',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'productList',
                    'resource'	=> '产品管理',
                ),
            ),
        ),
        '3' => array(
            'controller' => 'approval',//
            'resource'   => '审批管理',
            'icon'   => 'envelope-alt',
            'son'        => array(
                '1' => array(
                    'action'  => 'approvalList',
                    'resource' => '审批管理',
                ),
                '2' => array(
                    'action'  => 'entrustList',
                    'resource' => '委托管理',
                ),
            ),
        ),
        '10' => array(
			'controller' => 'power',
			'resource'   => '权限管理',
			'icon'		 =>	'wrench',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'index',
                    'resource'	=> '用户表',
                ),
                '2'	=> array(
                    'action' 	=> 'authGroup',
                    'resource'	=> '权限组表',
                ),
                '3'	=> array(
                    'action' 	=> 'authRule',
                    'resource'	=> '权限规则表',
                ),
            ),
		),

	),
	
);