<?php
return array(
	'memu'  => array(

        '1' => array(
            'controller' => 'dispatch',
            'resource'   => '单位管理',
            'icon'		 =>	'envelope-alt',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'customerList',
                    'resource'	=> '单位列表',
                ),
            ),
        ),
		// 后台菜单
        '2' => array(
            'controller' => 'dispatch',
            'resource'   => '派遣管理',
            'icon'		 =>	'envelope-alt',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'customerList',
                    'resource'	=> '派遣单位',
                ),
                '2' =>  array(
                    'action'    =>  'employManage',
                    'resource'  =>  '派遣员工花名册',
                    'is_ref' => '_blank',
                ),
                '3' =>  array(
                    'action'    =>  'fileImport',
                    'resource'  =>  '花名册导入',
                ),
                '4' =>  array(
                    'action'    =>  'fileImportList',
                    'resource'  =>  '文件管理',
                ),
                '5' =>  array(
                    'action'    =>  'contractAlert',
                    'resource'  =>  '合同到期提醒设置',
                ),
            ),
        ),
        '3' => array(
            'controller' => 'employ',
            'resource'   => '员工管理',
            'icon'		 =>	'envelope-alt',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'toEmployList',
                    'resource'	=> '员工查询',
                ),
                '2'	=> array(
                    'action' 	=> 'toImportEmploy',
                    'resource'	=> '员工导入',
                ),
                '3'	=> array(
                    'action' 	=> 'toBaseNumUpdate',
                    'resource'	=> '基数批量修改',
                ),
                '4'	=> array(
                    'action' 	=> 'toEmploySalarySearch',
                    'resource'	=> '工资查询管理',
                ),
            ),
        ),
        '4' => array(
            'controller' => 'social',
            'resource'   => '社保管理',
            'icon'		 =>	'envelope-alt',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'getSocialList',
                    'resource'	=> '社保导入',
                ),
                '2'	=> array(
                    'action' 	=> 'getGjjinList',
                    'resource'	=> '公积金导入',
                ),
                '3'	=> array(
                    'action' 	=> 'showSocialList',
                    'resource'	=> '社保增员列表',
                ),
                '4'	=> array(
                    'action' 	=> 'showGjjinList',
                    'resource'	=> '公积金增员列表',
                ),
                '5'	=> array(
                    'action' 	=> 'showSocialReduceList',
                    'resource'	=> '社保减员列表',
                ),
                '6'	=> array(
                    'action' 	=> 'showGjjinReduceList',
                    'resource'	=> '公积金减员列表',
                ),
                '7'	=> array(
                    'action' 	=> 'showSocialException',
                    'resource'	=> '社保/公积金异常列表',
                )
            ),
        ),
        '5' => array(
            'controller' => 'financial',
            'resource'   => '财务管理',
            'icon'		 =>	'user',
            'son'		 => array(
                '1'	=> array(
                    'action' 	=> 'toBankIntoOutPage',
                    'resource'	=> '银行进出帐',
                ),
                '2'	=> array(
                    'action' 	=> 'examineSalary',
                    'resource'	=> '工资表审核',
                ),
                '3'	=> array(
                    'action' 	=> 'salaryAccount',
                    'resource'	=> '银行流水',
                ),
                '4' =>  array(
                    'action'    =>  'salaryListPage',
                    'resource'  =>  '工资表',
                ),
                '5' =>  array(
                    'action'    =>  'getSocialList',
                    'resource'  =>  '社保公积金',
                ),
                '6' =>  array(
                    'action'    =>  'getNianSalaryList',
                    'resource'  =>  '年终奖',
                ),
                '7' =>  array(
                    'action'    =>  'companyAccountUpdate',
                    'resource'  =>  '公司账户余额修改',
                ),
            ),
        ),
        '9' => array(
            'controller' => 'makeSalary',
            'resource'   => '工资申报',
            'icon'		 =>	'shopping-cart',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'toSalaryPage',
                    'resource'	=> '工资',
                ),
                '2' =>  array(
                    'action'    =>  'toErSalaryPage',
                    'resource'  =>  '二次工资',
                ),
                '3' =>  array(
                    'action'    =>  'toNianSalaryPage',
                    'resource'  =>  '年终奖',
                ),
                '4' =>  array(
                    'action'    =>  'unit',
                    'resource'  =>  '单位管理',
                ),
                '5' =>  array(
                    'action'    =>  'examineSalary',
                    'resource'  =>  '工资审核',
                ),
                '6' =>  array(
                    'action'    =>  'salaryFirstSearchPage',
                    'resource'  =>  '工资查询',
                ),
                '7' =>  array(
                    'action'    =>  'salaryPerSearch',
                    'resource'  =>  '个人工资查询',
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
		'11' => array(
            'controller' => 'tax',
            'resource'   => '个税管理',
            'icon'		 =>	'wrench',
            'son'        => array(
                '1'	=> array(
                    'action' 	=> 'taxAdmin',
                    'resource'	=> '个税管理',
                ),
                '2'	=> array(
                    'action' 	=> 'taxExport',
                    'resource'	=> '个税导出',
                ),
                '3'	=> array(
                    'action' 	=> 'nianTaxExport',
                    'resource'	=> '年终奖个税导出',
                )
            ),
		
		),
        '12' => array(
            'controller' => 'financial',
            'resource'   => '银行进出帐',
            'icon'		 =>	'user',
            'son'		 => array(
                '1'	=> array(
                    'action' 	=> 'toBankIntoOutPage',
                    'resource'	=> '银行进出帐',
                ),
                '2'	=> array(
                    'action' 	=> 'salaryAccount',
                    'resource'	=> '银行流水',
                ),
            ),
        ),
		'21' => array(
			'controller' => 'manager',
			'resource'   => '管理员',
			'icon'		 =>	'user-md',

		),
		'22' => array(
			'controller' => 'logs',
			'resource'   => '操作日志',
			'icon'		 =>	'file',
		),
        '23' => array(
			'controller' => 'adminCompany',
            'action'    =>  'unit',
			'resource'   => '单位管理',
			'icon'		 =>	'file',
		),

	),
	
);