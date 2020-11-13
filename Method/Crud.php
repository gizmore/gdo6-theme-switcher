<?php
namespace GDO\ThemeSwitcher\Method;

use GDO\Core\GDO;
use GDO\Core\MethodAdmin;
use GDO\Form\MethodCrud;
use GDO\ThemeSwitcher\GDO_Theme;
use GDO\ThemeSwitcher\Module_ThemeSwitcher;

final class Crud extends MethodCrud
{
    use MethodAdmin;
    
    public function beforeExecute()
    {
        $this->renderNavBar();
        Module_ThemeSwitcher::instance()->renderAdminTabs();
    }
    
    public function getPermission() { return 'staff'; }
    
    public function hrefList() { return href('ThemeSwitcher', 'List'); }

    public function gdoTable() { return GDO_Theme::table(); }
    
    public function afterCreate($form, GDO $gdo)
    {
        $gdo->removeAllCache();
    }
    
    public function afterUpdate($form, GDO $gdo)
    {
        $gdo->removeAllCache();
    }
    
    public function afterDelete($form, GDO $gdo)
    {
        $gdo->removeAllCache();
    }
    
    
}
