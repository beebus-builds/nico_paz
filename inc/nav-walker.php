<?php

class NicoPaz_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $classes = 'sub-menu absolute left-0 top-full min-w-[200px] bg-white dark:bg-gray-950 border border-gray-100 dark:border-gray-800 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 pt-1 z-50 max-lg:static max-lg:shadow-none max-lg:border-0 max-lg:rounded-none max-lg:opacity-100 max-lg:visible max-lg:max-h-0 max-lg:overflow-hidden max-lg:transition-all max-lg:duration-300 max-lg:bg-transparent max-lg:dark:bg-transparent';
        if ($depth > 0) {
            $classes = 'sub-menu absolute left-full top-0 min-w-[200px] bg-white dark:bg-gray-950 border border-gray-100 dark:border-gray-800 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ml-1 z-50 max-lg:static max-lg:shadow-none max-lg:border-0 max-lg:rounded-none max-lg:opacity-100 max-lg:visible max-lg:max-h-0 max-lg:overflow-hidden max-lg:transition-all max-lg:duration-300 max-lg:bg-transparent max-lg:dark:bg-transparent';
        }
        $output .= '<ul class="' . $classes . '">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        $li_classes = $depth === 0 ? 'relative group' : 'relative group';
        if ($has_children) $li_classes .= ' menu-item-has-children';

        $output .= '<li class="' . $li_classes . '">';

        $atts = [];
        $atts['title']  = !empty($item->attr_title) ? esc_attr($item->attr_title) : '';
        $atts['target'] = !empty($item->target) ? esc_attr($item->target) : '';
        $atts['rel']    = !empty($item->xfn) ? esc_attr($item->xfn) : '';
        $atts['href']   = !empty($item->url) ? esc_url($item->url) : '#';
        $atts['class']  = 'text-nico-dark dark:text-gray-100 font-medium text-xs xl:text-sm uppercase tracking-normal xl:tracking-wider hover:text-celeste dark:hover:text-white transition-colors py-2 inline-flex items-center gap-1';

        $attributes = '';
        foreach ($atts as $name => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $name . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $link = '<a' . $attributes . '>';
        if ($has_children) {
            $link .= $title . '<svg class="w-3 h-3 ml-1 lg:block hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>';
        } else {
            $link .= $title;
        }
        $link .= '</a>';

        if ($has_children) {
            $link .= '<button class="submenu-toggle lg:hidden p-2 absolute right-0 top-1 text-nico-gray dark:text-gray-400 hover:text-celeste dark:hover:text-white transition-colors" aria-label="Toggle submenu" aria-expanded="false">';
            $link .= '<svg class="w-4 h-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>';
            $link .= '</button>';
        }

        $output .= apply_filters('walker_nav_menu_start_el', $link, $item, $depth, $args);
    }
}
