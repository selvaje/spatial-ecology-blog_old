$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array('sanitize_callback' => 'sanitize_text_field','capability' => 'edit_theme_options',));

        $wp_customize->add_control(

                'zerif_aboutus_feature1_nr',

                array(

                    'label' => __( 'Feature no1 percentage', 'zerif' ),

                    'section' => 'zerif_aboutus_feature1_section',

                    'settings' => 'zerif_aboutus_feature1_nr',

                    'priority'    => 3

                ));
