{block name="widgets_emotion_components_cosmiq_banner_element"}
    <div class="emotion--cosmiq-banner"{if $Data.cosmiq_banner_background_image} style="background-image: url('{$Data.cosmiq_banner_background_image}');"{/if}>
        <div class="cosmiq-banner--textfield">
            <div class="cosmiq-banner--title">{$Data.cosmiq_banner_title}</div>
            <div class="cosmiq-banner--description">{$Data.cosmiq_banner_description}</div>
            <div class="cosmiq-banner--button">
                <a href="{$Data.cosmiq_banner_button_link}" class="btn">{$Data.cosmiq_banner_button_title}</a>
            </div>
        </div>
    </div>
    <pre style="display:none;">{$Data|@print_r}</pre>
{/block}