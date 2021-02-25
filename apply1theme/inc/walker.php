<?php 


class Primary_Nav_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = \null, $id = 0)
    {
        $indent = str_repeat("\t", $depth);

        $li_attributes = '';
        $values = '';

        $output .= $indent . '<li ' . $values . $li_attributes . ' class="tm-nav-li">';

        // making the a tag attributes
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '" ' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '" ' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '" ' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '" ' : '';

        $menu_item = $args->before;
        $menu_item .= '<a' . $attributes . ' class="tm-nav-link" >';
        $menu_item .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $menu_item .= '</a>';
        $menu_item .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $menu_item, $item, $depth, $args);
    }
}