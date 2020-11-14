<?phpuse GDO\ThemeSwitcher\GDO_Theme;
use GDO\UI\GDT_ListItem;use GDO\UI\GDT_Paragraph;use GDO\UI\GDT_EditButton;/** @var $gdo GDO_Theme **/
$li = GDT_ListItem::make()->gdo($gdo);$li->content(GDT_Paragraph::make()->text('theme_li', [$gdo->displayName(), $gdo->displayChain()]));$li->actions()->addField(GDT_EditButton::make('edit')->href($gdo->hrefEdit()));echo $li->renderCell();