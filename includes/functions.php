<?php

// Add faqs module to pages
// function add_faqs_to_page_content($content) {
//     $post_type = get_post_type();
//     $allowed_post_types = array(
//         'post',
//         'page',
//         'e-landing-page',
//         'elementor_library',
//         'solutions',
//         'hardware-products',
//         'software-products',
//         'casos-exito',
//         'wpdmpro',
//     );

//     // Check if the current post type is allowed to display FAQs
//     if (is_singular($allowed_post_types)) {
//         ob_start();
//         add_faqs_module();
//         $faq_content = ob_get_clean();

//         // Get the position of the target div "contact-section-solutions" in the content
//         $target_div_position = strpos($content, '<div class="contact-section-solutions alignfull">');

//         // Insert the FAQs section just before the target div, if found
//         if ($target_div_position !== false) {
//             $content = substr_replace($content, $faq_content, $target_div_position, 0);
//         } else {
//             // If the target div is not found, simply append the FAQs section to the end
//             $content .= $faq_content;
//         }
//     }

//     return $content;
//     var_dump($faq_content);
// }
// add_filter('the_content', 'add_faqs_to_page_content');

// Add faqs module to pages
function add_faqs_to_page_content($content) {
    $post_type = get_post_type();
    var_dump($post_type);
    $allowed_post_types = array(
        'post',
        'page',
        'e-landing-page',
        'elementor_library',
        'solutions',
        'hardware-products',
        'software-products',
        'casos-exito',
        'wpdmpro',
    );

    // Check if the current post type is allowed to display FAQs
    if (is_singular($allowed_post_types)) {
        ob_start();
        add_faqs_module();
        $faq_content = ob_get_clean();
        $content .= $faq_content;
    }
    var_dump($faq_content);
    return $content;
}
add_filter('the_content', 'add_faqs_to_page_content');
add_filter('the_content', 'add_faqs_module');

function add_faqs_module() {
    $incluir_faqs = get_field('incluir_faqs');
    $faqs_section = get_field('faqs_section');

    var_dump($incluir_faqs); // Debug statement to check the value of incluir_faqs
    var_dump($faqs_section); // Debug statement to check the value of faqs_section

    // Contar la cantidad de preguntas no vacías
    // $faqs_section = $faqs_section;
    $numero_preguntas_no_vacias = 0;
    if (is_array($faqs_section)) {
        foreach ($faqs_section as $faq) {
            $pregunta = $faq['question'];
            if (!empty($pregunta)) {
                $numero_preguntas_no_vacias++;
            }
        }
    }

    // Validar que se muestre la sección de preguntas frecuentes
    if ($incluir_faqs == true && $numero_preguntas_no_vacias > 0) {
        echo '<section class="faqs">
			<div class="container">
				<div class="row">
                    <h2 class="faqs__title">Preguntas frecuentes</h2>
				</div>
				<div class="row">';
        // Iterar sobre todas las preguntas y respuestas ingresadas por el usuario
        if (is_array($faqs_section)) {
            foreach ($faqs_section as $faq) {
                $pregunta = $faq['question'];
                $respuesta = $faq['answer'];

                if (!empty($pregunta) && !empty($respuesta)) {
                    echo '<details class="faqs__item">
                                <summary class="faqs__item__title">
                                    <i class="fas fa-chevron-down"></i>
                                    <h3>'.$pregunta.'</h3>
                                </summary>
                                <div class="faqs__item__content">'.$respuesta.'</div>
                            </details>';
                }
            }
        }
        echo '</div>
			</div>
        </section>';
        var_dump($faqs_section);
    }
}