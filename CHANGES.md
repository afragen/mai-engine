# Changelog

## 2.7.1 (12/1/20)
* Fixed: Removed PHP 7.3+ function.

## 2.7.0 (11/30/20)
* Added: New `cart_total="true"` parameter for `[mai_icon]` shortcode to display current cart total over an icon (great for menu items).
* Added: New `[mai_cart_total]` shortcode to display current cart total.
* Added: New `[mai_avatar]` shortcode for use in Header/Footer meta fields on single/archive content or in Mai Grid blocks.
* Added: Better default styling for WooCommerce reviews.
* Added: Latest icons from Font Awesome Pro.
* Changed: Widget Areas config syntax now uses id for the array key.
* Changed: Logo spacing value output now output separate properties.
* Changed: Much more thorough and performant header JS.
* Changed: Header/logo shrink animation is now faster when scrolling back to top.
* Fixed: Header jank when shrinking/scrolling in some instances.
* Fixed: Bold font weight not loading or displaying correctly in some instances.
* Fixed: AMP menu not displaying at all, or without styling in some instances.
* Fixed: WooCommerce star ratings not displaying correctly.
* Fixed: Error when using spacing or content width settings on a block without content.
* Fixed: More thorough handling of has-light-background helper class.
* Fixed: Body min-height now accounts for admin bar.
* Fixed: Error with first/last menu item class when the first or last item has child menu items.
* Fixed: Cover block inner content aligning incorrectly on layouts with a sidebar.
* Fixed: Menu hover colors when using a dark, transparent header.

## 2.6.3.1 (11/13/20)
* Fixed: Force update to show.

## 2.6.3 (11/13/20)
* Added: Much more performance template parts query.
* Changed: Reorganized font custom properties for easier overriding when customizing CSS.
* Changed: All font custom properties now output manually in the same function.
* Fixed: Submenu alignment when centering menus in `[mai_menu]` shortcode.

## 2.6.2 (11/12/20)
* Changed: Added has-overlap class to any block that uses overlap margin settings.
* Fixed: Better default Pullquote block styles on front end and editor.
* Fixed: Page Header overlay fallbacks not working correctly in some instances.
* Fixed: Better default font CSS when use standard (non-Google) fonts in Customizer.

## 2.6.1 (11/11/20)
* Changed: Nav menu slug to menu wrap when using `[mai_menu]` shortcode.
* Fixed: Sticky header not sticking to top when logged out.
* Fixed: Syntax error warnings when debugging is on.

## 2.6.0 (11/11/20)
* Added: Documentation and Support links under Mai Theme Dashboard menu.
* Added: Also added Template Parts and Reusable Blocks link under Mai Theme Dashboard menu, leaving them under Appearance as well.
* Added: Margin settings, inclucing Overlap, to Group/Cover/Image blocks.
* Added: Heading and Subheading block styles to the Paragraph block.
* Added: Alternating images setting to Mai Post/Term Grid blocks.
* Added: The block editor now respects content width of chosen layout. Page refresh required when changing the layout in the editor itself.
* Added: New has-light-background helper class to force dark text on Cover block when using light images.
* Added: New has-{size}-margin-left/right helper classes.
* Added: New is-sticky helper class.
* Added: New has-border and has-border-radius helper classes.
* Added: New "Import From Demo" link in Template Parts to automatically import invidiual template parts from the demo.
* Added: New "Flush local fonts"
* Added: SVG's now work as logos when using a plugin or code to enable SVG uploads.
* Added: Dismissable admin notice on Widgets screen to get to Template Parts.
* Changed: WP toolbar is now fixed positioned on large screens, and uses default positioning from WP.
* Changed: WP core Columns block now uses core breakpoints for responsive behavior.
* Changed: Search block now uses secondary button color.
* Changed: More refined cite/caption CSS styling.
* Changed: Submenus now inherit default border-radius from the theme.
* Changed: Entry meta wrap is now a div instead of span, so you can do more with Header/Footer meta Customizer fields.
* Changed: Remove unecessary EDD dependency plugin when using Easy Digital Downloads.
* Changed: Now passing all `$args` to grid query args PHP filters.
* Changed: Remove unecessary styling on After Entry template part.
* Changed: Load child theme stylesheet last when "Load in footer" is not on in Customizer.
* Changed: Update ACF Pro to 5.9.3.
* Changed: More efficient image loading when using "Auto" columns in Mai Post/Term Grid blocks.
* Changed: Template Parts uses a new structure in config.php.
* Changed: Simplified menu and submenu CSS.
* Changed: Page Header overlay now allows 0 for overlay, or 1 to use default/fallback overlay.
* Changed: Removed unecessary border bottom on page header.
* Changed: Added top spacing on button block wrap and entry read more link to match paragraph bottom spacing and line height.
* Changed: Added more button margin to the main entry title on singular content.
* Fixed: Social links block breaking links (adding an extra s in httpss) in some instances.
* Fixed: Bold and italic and sometimes default font weights and variants not loading correctly in some instances.
* Fixed: Google fonts still being loaded even when none are used in Customizer.
* Fixed: Links and headings with long words not wrapping on smaller screens.
* Fixed: More refined transparent/fixed header JS to fix various glitches when resizing/scrolling in some instances.
* Fixed: Fixed background image on Cover block not working when transparent header was enabled.
* Fixed: More performant/efficient background cover image.
* Fixed: More srcset/performance improvements for entry images.
* Fixed: Margin default causing issues on Heading block in some scenarios.
* Fixed: Mobile menu links not visible when using a dark background and sticky header at certain screen widths.
* Fixed: Unecessary :visited styles for buttons.
* Fixed: Button classes being duplicated when multiple menus are on a page.
* Fixed: Search and date archives not using choice in Site Layouts.
* Fixed: PHP error when using Exclude Displayed setting in Mai Post Grid block in some scenarios.
* Fixed: Fatal error when switching directly from a v1 to v2 theme.
* Fixed: Wide align causing content to get cut off in the editor on smaller screens.
* Fixed: Paragraph block padding when setting a background color.
* Fixed: Structured data error with page-header itemref.
* Fixed: Allow menu search icon to work in Before Header template part.
* Fixed: Menu item buttons now use menu font size.
* Fixed: Make sure "Active" post state only shows on Template Parts.
* Fixed: Entry content margins being when nesting entries in some scenarios.
* Fixed: Grid "Display boxed styling" is now available even if not showing images.
* Fixed: Blog description not showing when Page Header was using on the blog archive.
* Fixed: Body and heading Google fonts can now use italic as the default style.

## 2.5.2 (10/2/20)
* Changed: Editors can now edit template parts.
* Changed: Slightly more performant query when getting template parts.
* Fixed: More thorough fix for Mai Divider gap issue.

## 2.5.1 (10/1/20)
* Changed: After Header template part now displays after the After Header Menu location.
* Changed: Color palette now shows the actual color setting name instead of the hex code.
* Changed: Grid/entry images now use more thorough logic to build srcset and size image attributes, for even better performance.
* Changed: All svg icons now use https for xmlns attribute.
* Changed: Remove underline when hovering entry title links and adjacent entry navigation.
* Changed: Much cleaner WooCommerce account navigation styling.
* Fixed: After Header template part now works with transparent header.
* Fixed: Timeout error when trying to view revisions.
* Fixed: Transparent header was showing a gap when after header navigation was displaying.
* Fixed: Menu item button color was not inheriting button color.
* Fixed: Mai Divider would sometimes show a small gap in Chrome/Firefox.
* Fixed: Mai Grid blocks had a side gap when set to Align Full.
* Fixed: Mai Delight blockquote quote was cut off in Safari in some instances.
* Fixed: Mai Delight page header only shows transparent white box if there is content in it.
* Fixed: 404 pages were displaying posts unintentionally in some instances.

## 2.5.0 (9/25/20)
* Added: New After Header template part.
* Added: New Spacing settings to Heading, Paragraph, and Separator blocks.
* Added: New Width settings to Heading and Paragraph blocks.
* Added: The ability to align a menu item left or right with has-auto-margin-left/right.
* Changed: Hide Elements now show all available settings, even if those elements aren't currently displaying.
* Changed: Spacing settings (padding) now scales down slightly less on mobile.
* Changed: Sizing button group labels are now S/M/L instead of SM/MD/LG.
* Changed: Button menu items now have the same spacing as regular non-button menu items.
* Fixed: Some scss calculations converting px to rem with wrong base font size.
* Fixed: More thorough and lightweight background cover images.
* Fixed: Mai Reusable Block widget wasn't showing the saved value when refreshing the page.
* Fixed: Removed extra padding on Group and Cover blocks when they are nested.
* Fixed: Even more refinded WooCommerce styling to match the theme.
* Fixed: WooCommerce cart layout issues with some add-ons like WooCommerce Product Add-ons.

## 2.4.5 (9/18/20)
* Fixed: WooCommerce cart layout was broken on extra small mobile devices.

## 2.4.4 (9/17/20)
* Added: Support for Mai Delight Travel demo.
* Added: Support for Mai Studio Agency demo.
* Changed: Mai Term Grid only shows top level terms as the default.
* Fixed: Removed link button side padding if it's the first button.
* Fixed: Better check for paginated archives.
* Fixed: List styles in term descriptions.
* Fixed: Make sure links in comments wrap.
* Fixed: Align Full option was missing from Mai Term Grid.
* Fixed: Column gap wasn't working when set to None in some instances.
* Fixed: Search icon in menu was wrongly inheriting border and box shadow in some themes.
* Fixed: Posts per page now set to the theme default when activating the theme.
* Fixed: Typo in page header CSS custom properties.
* Fixed: WooCommerce Sale badge was missing on single product pages in some instances.
* Fixed: WooCommerce My Account navigation links weren't taking up full container width.
* Fixed: Duplicate category descriptions displaying on WooCommerce category archives in some instances.
* Fixed: WooCommerce shop title size and product count styling.

## 2.4.3 (9/4/20)
* Added: New helper utility classes for hidden-{breakpoint}, hidden-{breakpoint}-up, and hidden-{breakpoint}-down to hide elements at various breakpoints.
* Added: Now use Mai Theme icon as favicon if none set in Customizer.
* Added: Mai Icon now has a setting to open links in new window.
* Changed: Deprecated heading font size settings now that they are in WP core.
* Fixed: Buttons not working correctly/efficiently when adding button classes to menu items.
* Fixed: Author box not 100% width of container in some scenarios.
* Fixed: Default footer credits template part showing a warning/error when trying to edit the text.
* Fixed: Ellipsis was showing on content/excerpts even when text is not truncated.
* Fixed: Mai Grid markup was being output even if no entries matched the query.
* Fixed: Breadcrumbs not matching content side spacing.
* Fixed: Custom button border radius not working in some instances.
* Fixed: WooCommerce checkout page, and payment gateway layout and styling.
* Fixed: WooCommerce product grid showing list styles.
* Fixed: Entries wrap not taking up full width of the container.
* Fixed: Mai Grid entry layout being affected by WooCommerce CSS when a grid is used on a product page.
* Fixed: Duplicate term descriptions showing on some WooCommerce taxonomy archives.
* Fixed: Better visited button default styling.
* Fixed: WooCommerce store notice now matches theme styling.

## 2.4.2 (8/27/20)
* Added: Updated Google Font list in Typography customizer fields via Kirki.
* Added: Before and after content HTML classes to entry meta.
* Added: Screen reader text title to read more links.
* Changed: Updated ACF Pro to 5.9.0.
* Changed: Updated Kirki.
* Changed: Updated the updater.
* Changed: More default left margin on lists in content.
* Changed: Remove unused body classes added from Genesis.
* Changed: After Entry template part is displayed by default if there is content in the template part.
* Fixed: Some site layout settings where not working in some configurations.
* Fixed: Button controls scrolling out of view when editing some blocks.
* Fixed: Spacing settings not showing spacing on blocks in editor.
* Fixed: Spacing and content width setting sizing in editor to fit changes in WP 5.5.
* Fixed: Deprecated `wp_make_content_images_responsive()` in WP 5.5.
* Fixed: Make sure theme CSS is loaded after all engine CSS.
* Fixed: Default submenu dropdown caret alignment was off.
* Fixed: Visible menu's menu items were not wrapping on mobile.
* Fixed: Align center vertically wasn't working correctly in some configurations of grid/archives.
* Fixed: Mai Grid blocks where not full width if nested in other blocks in some scenarios.
* Fixed: Better handling and consistent display of category/term description and intro text, including when page header is enabled.
* Fixed: Author box spacing.
* Fixed: Avatar was not using default size if unmodified.
* Fixed: WooCommerce default button styling now matches the theme better.
* Fixed: WooCommerce gallery image layout and styling tweaks.

## 2.4.1 (8/10/20)
* Added: New entry-wrap-{context} class for simpler CSS targeting.
* Added: Custom property for avatar border-radius.
* Changed: Single entry elements after all Genesis hooks are now outside of the entry-wrap.
* Changed: Revert buttons to use body font family/weight again.
* Fixed: Added back has-alignfull-first body class for simpler CSS targeting.
* Fixed: Duplicate cover images when nesting Cover block.
* Fixed: Remove menu item underline when a menu is in a template part.
* Fixed: Search icon in menu getting cut off in Before Header template part.
* Fixed: Page Header background color not working when a page header image is used.
* Fixed: Page Header description now processes the content so you can use curly quotes, shortcodes, HTML, etc.

## 2.4.0 (8/6/20)
* Added: Mai Grid blocks now have a setting to remove bottom spacing.
* Added: Top level template parts now have a div wrap with the template part name.
* Added: Show tagline setting in Site Identity customizer panel.
* Added: Link/URL field to Mai Icon block.
* Added: CSS only anchor link slow scroll, and scroll offset when sticky header is enabled.
* Added: Template Parts now respect Private post status for logged in admins. This is a great way to test before making them live/published.
* Added: Template Parts editor background styles to show transparency.
* Added: Template Parts can now be exported by WP exporter.
* Added: New has-sidebar or no-sidebar body class.
* Changed: Require a default site layout in customizer.
* Changed: Customizer setting defaults are now config based.
* Changed: Row and Column Gap settings are now a scale (sm, md, lg, etc.) instead of a text field for layout and design consistency.
* Changed: Default container margins and main container elements to make full width section layouts easier to remove margin.
* Changed: Font size when button-small class is used on buttons.
* Changed: Archive pagination buttons are now smaller by default.
* Changed: Remove border radius on entries when either row/column gap are 0.
* Changed: Replace clear link on many customizer settings with None/Default/Auto button.
* Changed: Center author bio on bio.
* Changed: Better default quote styling.
* Changed: Better dropcap default styling.
* Changed: Remove unecessary post classes.
* Changed: Added entry-wrap div on entries for more flexible and consitent styling.
* Changed: Use heading color setting as text color for white buttons.
* Changed: Align full/wide tweaks on mobile when layout has a sidebar.
* Changed: Add itemtype schema to nav menus when using `[mai_menu]` shortcode or helper function.
* Changed: Sub menu toggle icon now correctly scales with menu font size.
* Changed: Remove default margin on separator block.
* Fixed: Site layouts not falling back correctly in some configurations.
* Fixed: Mobile menu displaying duplicate or overlapping menus when using Mobile Menu template part.
* Fixed: Archive/Single layout settings not working correctly on post types.
* Fixed: Template Parts auto creating unintentionally when posts per page is set less than 8.
* Fixed: Stop using the_content filter in template parts as some plugins incorrectly use the filter and add content to the template.
* Fixed: Border radius on entries when Image Position is Background.
* Fixed: Mai Post Grid meta queries not working correctly with some configurations.
* Fixed: Mai Post Grid meta value field not hidden compare is exists or not exists.
* Fixed: Mai Term Grid showing all terms when choosing terms and choices are empty.
* Fixed: Mai Grid block images when columns are set to Auto.
* Fixed: Mai Grid block not hiding Boxed setting when Image Position is Background.
* Fixed: Mai Grid block skewing background images on mobile.
* Fixed: Mai Grid block content overlapping image on mobile when stacking image/content is checked.
* Fixed: Mai Grid block image is always first on mobile if stacking, whether image position is left or right.
* Fixed: Safari desktop/iOS scrollbar causing horizontal scroll with alignfull blocks.
* Fixed: Fallback image not working correctly on page header in some configurations.
* Fixed: Allow page header overlay opacity to be 0.
* Fixed: Center aligned images not correctly centering.
* Fixed: Mobile menu and `[mai_menu]` shortcode styling tweaks.
* Fixed: `[mai_menu]` incorrectly showing a default menu when id is not a valid menu value.
* Fixed: Block container CSS tweaks in the editor.
* Fixed: Button border radius not working on hover when using a custom border radius.
* Fixed: Header gap when using transparent header and refreshing the page when already scrolled down and going back to top.
* Fixed: Default button styles in editor.
* Fixed: Nested group spacing settings overriding each other in editor.
* Fixed: Image size chooser incorrectly showing custom image sizes as the same size.
* Fixed: Transparent header not working correctly in some scenarios of hidden elements and header settings.
* Fixed: Adjacent entry pagination adding top margin incorrectly.
* Fixed: Input placeholder text getting lost on dark backgrounds.
* Fixed: Center aligned search block.
* Fixed: Cite elements not respecting color setting when in a group block.
* Fixed: WooCommerce onsale badge size.
* Fixed: Empty admin notice showing when deactivating some plugins.

## 2.3.0 (7/21/20)
* Added: Title size setting to Mai Grid blocks and Content Archive settings.
* Added: Size setting to core Heading block.
* Changed: Use chosen heading color for overlays to keep consistent styling.
* Changed: Removed default bottom margin on Mai Grid and archive entries.
* Changed: Remove border radius on entries if column or row gap is 0.
* Fixed: Inability to sort posts in the Dashboard.
* Fixed: Horizontal scrollbars shown in some scenarios when using full aligned blocks on a page.
* Fixed: Duplicate h1's on homepage. Site title is no longer an h1, ever.
* Fixed: Submit buttons being styled unexpectedly in the Dashboard.

## 2.2.2 (7/16/20)
* Changed: Group and cover blocks no longer have top and bottom default spacing set when adding a new instance of the block.
* Changed: Grid and archive entries now have gradient overlays with background image position when aligning text vertically.
* Changed: Add default footer credits text on new installs when footer credit template part is first created.
* Fixed: Divider not full width when used in Page Header with some configurations.
* Fixed: Default inner content width when using group and cover blocks in template parts.
* Fixed: Transparent header throwing a JS error if site header was hidden.
* Fixed: Template parts unintentionally showing socical icons and other 3rd part content that uses `the_content` filter.
* Fixed: Menu links when displaying a menu in a dark background group block.
* Fixed: Some color CSS not being output correctly.
* Fixed: Mai Grid block with boxed entry was showing white titles when inside a dark background group block.
* Fixed: Mai Grid block not working when columns were set to auto.

## 2.2.1 (7/15/20)
* Changed: Entry titles should be lg instead of xl on archives and grid blocks, as a default.

## 2.2.0 (7/15/20)
* Added: New left and right spacing settings on group and cover blocks.
* Changed: More performant template part query.
* Changed: Remove core block library theme CSS and include only necessary styling inside Mai Engine.
* Changed: Slightly larger line height on buttons.
* Changed: Mai Grid blocks are no longer clickable in the editor.
* Changed: Mai Icon now defaults to center alignment when adding a new instance.
* Fixed: Transparent header when entry title is not hidden.
* Fixed: Mai Icon defaults now work when adding a new block.
* Fixed: Mai Icon selected icon was too large in select field.
* Fixed: Mobile menu JS error in some scenarios.
* Fixed: Image block default margins, mostly a Chrome user agent override.

## 2.1.1 (7/14/20)
* Added: Template Parts and Reusable Blocks links to Toolbar > {Site Title} dropdown menu.
* Changed: Automatically create default template parts so users know what is available.
* Changed: Sub-menu animation is now 200ms. Subtle and noticeable, but not too slow.
* Changed: Updated Kirki to latest version.
* Changed: Automatically disable plugin dependencies (ACF, ACF Pro, Kirki) when installed as separate plugins.
* Fixed: Added missing accessibility skip links for template parts and header nav menus and removed sidebar skip link when there is no sidebar.
* Fixed: More thorough handling of text color when a group block has a dark background color.
* Fixed: After Header navigation not showing in some instances.
* Fixed: Grid/archive images not stacking correctly on mobile.
* Fixed: Transparent header showing when it shouldn't in some configurations.
* Fixed: Image block alignment tweaks.
* Fixed: Social icons block "No background" style not using default text color.
* Fixed: Social icons block alignment.
* Fixed: Nested sub-menu caret icon not pointing in the correct direction.
* Fixed: Setup wizard improvements when run multiple times for different Mai Themes.
* Fixed: Search block styling on small screens.
* Fixed: Cover block styling when using a background image.
* Fixed: Image caption alignment.
* Fixed: Small buttons missing smaller padding.
* Fixed: Missing "Toggle Hooks" link when sorting entry elements.

## 2.1.0 (7/10/20)
* Added: "None" setting to Group/Cover block spacing settings.
* Fixed: Page Header spacing settings not working in some instances.
* Fixed: Mai Divider not displaying correctly when used inside a Group or Cover block.
* Fixed: After Entry template part not displaying correctly.
* Fixed: Template parts not showing as options in the Hide Elements metabox.
* Fixed: Not all color were available in the editor color palette.
* Fixed: New installs of Mai Sparkle not using the correct alternate background color.
* Fixed: Transparent header not displaying correctly when a full aligned Group block was the first block in the content.
* Fixed: Heading colors now respect the color setting in Group and Cover blocks.
* Changed: Removed default margin on align left/right elements.

## 2.0.1 (7/9/20)
* Added: Typography/font settings.
* Changed: Major update to color settings and some Customizer controls. May require some reconfiguring of color palettes if already using custom colors. This should be the last change that may require manual attention when upgrading.

## 0.1.0
* Initial release.
