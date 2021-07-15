<?php
namespace GDO\ThemeSwitcher\Method;

use GDO\Core\Method;
use GDO\DB\GDT_Object;
use GDO\ThemeSwitcher\GDO_Theme;
use GDO\Session\GDO_Session;
use GDO\Core\Website;

/**
 * Switch the theme.
 * @author gizmore
 */
final class Set extends Method
{
    public function saveLastUrl() { return false; }
    
    public function isTrivial() { return false; }
    
    public function gdoParameters()
    {
        return [
            GDT_Object::make('theme')->table(GDO_Theme::table())->notNull(),
        ];
    }
    
    /**
     * @return GDO_Theme
     */
    public function getTheme()
    {
        return $this->gdoParameterValue('theme');
    }
    
    public function execute()
    {
        $theme = $this->getTheme();
        GDO_Session::set('theme_name', $theme->getName());
        GDO_Session::set('theme_chain', $theme->getChain());
        Website::redirectMessage('msg_switched_theme', [$theme->displayName()], @$_REQUEST['ref']);
    }
    
}
