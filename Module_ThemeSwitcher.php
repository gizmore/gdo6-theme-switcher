<?php
namespace GDO\ThemeSwitcher;

use GDO\Core\GDO_Module;
use GDO\DB\GDT_Checkbox;
use GDO\UI\GDT_Page;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Divider;

/**
 * Adds a theme switcher widget as well as db stored themes.
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class Module_ThemeSwitcher extends GDO_Module
{
    public $module_priority = 2;
    
    public function href_administrate_module() { return $this->href('Admin'); }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/themeswitcher'); }
    
    public function getClasses() { return [GDO_Theme::class]; }
    
    public function getConfig()
    {
        return [
            GDT_Checkbox::make('hook_left_bar')->initial('1'),
        ];
    }
    
    public function cfgHookLeftBar() { return $this->getConfigValue('hook_left_bar'); }
    
    public function onInstall()
    {
        if (GDO_Theme::table()->countWhere() === 0)
        {
            GDO_Theme::blank([
                'theme_name' => GDO_Theme::getDefinedTheme(),
                'theme_chain' => GWF_THEMES,
            ])->insert();
        }
    }
    
    public function onIncludeScripts()
    {
        $this->addJavascript('js/gdo6-theme-switcher.js');
    }
    
    public function renderAdminTabs()
    {
        $tabs = GDT_Bar::make('theme_admin_tabs')->horizontal();
        
        $tabs->addFields([
            GDT_Link::make('list_themes')->href($this->href('Themes')),
            GDT_Link::make('add_theme')->href($this->href('Crud')),
        ]);
        
        GDT_Page::$INSTANCE->topTabs->addField($tabs);
    }

    public function hookLeftBar(GDT_Bar $bar)
    {
        if ($this->cfgHookLeftBar())
        {
            $bar->addField(GDT_ThemeSwitcher::make());
            $bar->addField(GDT_Divider::make());
        }
    }
    
}
