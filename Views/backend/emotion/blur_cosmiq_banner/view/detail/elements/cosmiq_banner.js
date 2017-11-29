//
//{block name="backend/emotion/view/detail/elements/base"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.Emotion.view.detail.elements.CosmiqBanner', {

    extend: 'Shopware.apps.Emotion.view.detail.elements.Base',

    alias: 'widget.detail-element-emotion-components-cosmiqbanner',

    componentCls: 'emotion--cosmiq-banner',

    icon: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkYzOEUwMkZFQTZGNzExRTdBMUQ3RTVDMTgzNDBDOUNFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkYzOEUwMkZGQTZGNzExRTdBMUQ3RTVDMTgzNDBDOUNFIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RjM4RTAyRkNBNkY3MTFFN0ExRDdFNUMxODM0MEM5Q0UiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RjM4RTAyRkRBNkY3MTFFN0ExRDdFNUMxODM0MEM5Q0UiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7P4QAIAAAAeUlEQVR42uzZ0QmAIBQFUA2HaoiGaZSGaYi2sv9+JJVMOPdfHgfuQ8SYcw4zZwmTBwAAAGBsUu3B47y6XiD7tkYVAvjDDpS6XdvVXrv1nK9CAAAAAAAAAAAAAAAAAACTJpVe/V/n7XwVAmhM9EsJAAAAAAAwMLcAAwB4cRRJZ51nMwAAAABJRU5ErkJggg==',

    /**
     * You can override the original `createPreview()` method
     * to create a custom grid preview for your element.
     *
     * @returns { string }
     */
    createPreview: function () {
        var me = this,
            preview = '',
            image = me.getConfigValue('cosmiq_banner_background_image'),
            style;

        if (Ext.isDefined(image)) {
            style = Ext.String.format('background-image: url([0]);', image);

            preview = Ext.String.format('<div class="x-emotion-banner-element-preview" style="[0]"></div>', style);
        }

        return preview;
    }
});
//{/block}