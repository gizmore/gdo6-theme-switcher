<?php
namespace GDO\ThemeSwitcher\Method;

use GDO\Core\Method;
use GDO\Core\MethodAdmin;
use GDO\ThemeSwitcher\Module_ThemeSwitcher;

final class Admin extends Method
{
    use MethodAdmin;
    
    public function beforeExecute()
    {
        $this->renderNavBar();
        Module_ThemeSwitcher::instance()->renderAdminTabs();
    }
    
    public function execute()
    {
        
    }
    
}
