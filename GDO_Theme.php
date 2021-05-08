<?php
namespace GDO\ThemeSwitcher;

use GDO\Core\GDO;
use GDO\DB\GDT_Name;
use GDO\DB\GDT_String;
use GDO\Util\Strings;
use GDO\Core\GDT_Template;
use GDO\Session\GDO_Session;

/**
 * A predefined theme chain.
 * Named and selectable via GDT_ThemeSwitcher.
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class GDO_Theme extends GDO
{
    public static function getDefinedTheme()
    {
        if ($theme = GDO_Session::get('theme_name'))
        {
            return $theme;
        }
        return Strings::substrTo(GDO_THEMES, ',', GDO_THEMES);
    }

    ###########
    ### GDO ###
    ###########
    public function gdoColumns()
    {
        return [
            GDT_Name::make('theme_name')->primary(),
            GDT_String::make('theme_chain'),
        ];
    }
    
    ##############
    ### Getter ###
    ##############
    public function getName() { return $this->getID(); }
    public function getChain() { return $this->getVar('theme_chain'); }
    
    ############
    ### HREF ###
    ############
    public function hrefEdit() { return href('ThemeSwitcher', 'Crud', "&id={$this->getID()}"); }

    ###############
    ### Display ###
    ###############
    public function displayName() { return $this->display('theme_name'); }
    public function displayChain() { return $this->display('theme_chain'); }
    
    ##############
    ### Render ###
    ##############
    public function renderList() { return GDT_Template::php('ThemeSwitcher', 'list/theme.php', ['gdo' => $this]); }
    
}
