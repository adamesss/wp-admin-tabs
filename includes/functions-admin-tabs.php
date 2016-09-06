<?php
// WP Admin Tabs functions
if ( ! function_exists( 'admin_tabs' ) ) :
    function admin_tabs( $name, $titles = [], $content = []) {
        $prefix = 'tab';
        $container_id = $prefix . '-' . $name;
        $count = count($titles) >= count($content) ? count($titles) : count($content);

        $result = '<div id="' . $container_id . '" class="tab-container tab-container-without-js">';
        $result_titles = '<div class="nav-tab-wrapper" role="tablist">';
        $result_content = '<div class="tab-content">';

        for ($i = 0; $i < $count; $i++){
            if($i == 0) {
                $link_class = "nav-tab nav-tab-active";
                $tab_class = "tab-pane";
            } else {
                $link_class = "nav-tab";
                $tab_class = "tab-pane hidden";
            }
            $tab_id = $prefix . '-' . $name . '-' . $i;
            $link_href = '#' . $tab_id;
            if($titles[$i])
                $link_text = $titles[$i];

            $result_titles .= '<a href="' . $link_href . '" class="' . $link_class . '"  role="tab">' . $link_text . '</a>';

            $result_content .= '<div id="' . $tab_id . '" class="' . $tab_class . '"  role="tabpanel"><table class="form-table">';
            if($content[$i]){
                $result_content .= $content[$i];
            }
            $result_content .= '</table></div>';
        }

        $result_titles .= '</div>';
        $result_content .= '</div>';
        $result .= $result_titles . $result_content . '</div>';

        return $result;
    }
endif;

if ( ! function_exists( 'get_admin_tabs' ) ) :
    function get_admin_tabs( $name, $titles = [], $content = []) {
        echo admin_tabs( $name, $titles, $content);
    }
endif;
