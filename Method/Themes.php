<?php
namespace GDO\ThemeSwitcher\Method;

use GDO\Table\MethodQueryList;
use GDO\ThemeSwitcher\GDO_Theme;
use GDO\ThemeSwitcher\Module_ThemeSwitcher;
use GDO\Core\MethodAdmin;

/**
 * List all theme switcher themes.
 * Very common and easy task to render a list out of a db.
 * @author gizmore
 * @version 6.10.1
 * @since 6.10.0
 */
final class Themes extends MethodQueryList
{
    use MethodAdmin; # default admin method permission stuff and navbar rendering

    /**
     * Rende
     * {@inheritDoc}
     * @see \GDO\Core\Method::beforeExecute()
     */
    public function beforeExecute()
    {
        $this->renderNavBar(); # admin navbar
        Module_ThemeSwitcher::instance()->renderAdminTabs(); # switcher navbar
    }
    
    public function gdoTable()
    {
        return GDO_Theme::table();
    }
    
}
