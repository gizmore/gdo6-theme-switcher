<?php
namespace GDO\ThemeSwitcher\Test;

use GDO\Tests\TestCase;
use GDO\ThemeSwitcher\GDO_Theme;
use function PHPUnit\Framework\assertEquals;

final class ThemeSwitcherTest extends TestCase
{
    /**
     * Generate all possible themes atm.
     * A testcase gdo6 installation can then easily use the theme switcher to test manually a few steps.
     * @TODO Make gdo_test.php run over multiple themes (all?)
     */
    public function testCreatingAllThemesForSelector()
    {
        $themes = [
            'Classic' => 'classic,default',
            'JQueryUI' => 'jqui,default',
            'Bootstrap4' => 'bootstrap,default',
            'JQueryMobile' => 'jqmobile,default',
            'AngularMaterial' => 'material,default',
        ];
        
        foreach ($themes as $name => $chain)
        {
            GDO_Theme::table()->blank([
                'theme_name' => $name,
                'theme_chain' => $chain,
            ])->insert();
        }
        
        $numThemes = GDO_Theme::table()->countWhere();
        
        assertEquals(5, $numThemes, 'Test if 5 themes can be created with theme switcher.');
    }
    
}
