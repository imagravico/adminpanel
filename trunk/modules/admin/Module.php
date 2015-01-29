<?php

namespace app\modules\admin;

use Yii;
use yii\helpers\Inflector;

/**
 * GUI manager for RBAC.
 * 
 * Use [[\yii\base\Module::$controllerMap]] to change property of controller. 
 * To change listed menu, use property [[$menus]].
 * 
 * ~~~
 * 'layout' => 'left-menu', // default to null mean use application layout.
 * 'controllerMap' => [
 *     'assignment' => [
 *         'class' => 'mdm\admin\controllers\AssignmentController',
 *         'userClassName' => 'app\models\User',
 *         'idField' => 'id'
 *     ]
 * ],
 * 'menus' => [
 *     'assignment' => [
 *         'label' => 'Grand Access' // change label
 *     ],
 *     'route' => null, // disable menu
 * ],
 * ~~~
 * 
 * @property string $mainLayout Main layout using for module. Default to layout of parent module.
 * Its used when `layout` set to 'left-menu', 'right-menu' or 'top-menu'.
 * @property array $menus List avalible menu of module.
 * It generated by module items .
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Module extends \yii\base\Module
{

    /**
     * @inheritdoc
     */
    public $defaultRoute = 'assignment';

    /**
     * @var array 
     * @see [[items]]
     */
    private $_menus;
    
    /**
     * Nav bar items
     * @var array  
     */
    public $navbar;

    /**
     * @var string Main layout using for module. Default to layout of parent module.
     * Its used when `layout` set to 'left-menu', 'right-menu' or 'top-menu'.
     */
    public $mainLayout ='@mdm/admin/views/layouts/main.php';

    /**
     * @inheritdoc
     */
	public function init()
    {
        parent::init();
        Yii::$app->i18n->translations['rbac-admin'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@app/modules/admin/messages'
            
        ];
        //user did not define the Navbar?
        if($this->navbar === null){        
            $this->navbar = [
                ['label' => Yii::t('rbac-admin', 'Help'), 'url' => 'https://github.com/mdmsoft/yii2-admin/blob/master/docs/guide/basic-usage.md'],
                ['label' => Yii::t('rbac-admin', 'Application'), 'url' => Yii::$app->homeUrl]
            ];
        }
    }

    /**
     * Get core menu
     * @return array
     * @var $ids array has 'Menu Lable' => 'Controller' pairs
     */
    protected function getCoreMenus()
    {
        $mid = '/' . $this->getUniqueId() . '/';
        $ids = ['Assignments' => 'assignment', 'Roles' => 'role', 'Permissions' => 'permission', 'Routes' => 'route', 'Rules' => 'rule', 'Menus' => 'menu'];
        $config = components\Configs::instance();
        $result = [];
        foreach ($ids as $lable => $id) {
            if ($id !== 'menu' || ($config->db !== null && $config->db->schema->getTableSchema($config->menuTable) !== null)) {
                $result[$id] = ['label' => Yii::t('rbac-admin', $lable), 'url' => [$mid . $id]];
            }
        }
        foreach (array_keys($this->controllerMap) as $id) {
            $result[$id] = ['label' => Yii::t('rbac-admin', Inflector::humanize($id)), 'url' => [$mid . $id]];
        }
        return $result;
    }

    /**
     * Get avalible menu.
     * @return array
     */
    public function getMenus()
    {
        if ($this->_menus === null) {
            return $this->_menus = $this->getCoreMenus();
        }
        return $this->_menus;
    }

    /**
     * Set or add avalible menu.
     * @param array $menus
     */
    public function setMenus($menus)
    {
        $mid = '/' . $this->getUniqueId() . '/';
        $this->_menus = $this->getMenus();
        foreach ($menus as $id => $value) {
            if (empty($value)) {
                unset($this->_menus[$id]);
            } else {
                $this->_menus[$id] = isset($this->_menus[$id]) ? array_merge($this->_menus[$id], $value) : $value;
                if (!isset($this->_menus[$id]['url'])) {
                    $this->_menus[$id]['url'] = [$mid . $id];
                }
            }
        }
    }
}