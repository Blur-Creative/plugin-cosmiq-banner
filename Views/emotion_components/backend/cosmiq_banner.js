//{block name="emotion_components/backend/cosmiq_banner"}
Ext.define('Shopware.apps.Emotion.view.components.CosmiqBanner', {

    /**
     * Extend from the base class for the emotion components
     */
    extend: 'Shopware.apps.Emotion.view.components.Base',

    /**
     * Create the alias matching the xtype you defined in your `createEmotionComponent()` method.
     * The pattern is always 'widget.' + xtype
     */
    alias: 'widget.emotion-components-cosmiqbanner',

    /**
     * The constructor method of each component.
     */
    initComponent: function () {
        var me = this,
        result = me.callParent(arguments);

        /**
         * Call the original method of the base class.
         */
        //me.callParent(arguments);
        

        me.orientationGroup = me.items['items'][1]['items']['items'][4];
        
        me.orientationGroup.columns = 3;
        me.orientationGroup.anchor = 'none';
        //me.orientationGroup.container.lastBox.width = 100;
        
        //console.dir(result[1]);
        console.log(me.getForm().findField('cosmiq_banner_textfield_orientation'));
        console.dir(me.items['items'][1]['items']['items']);
        console.dir(me.items['items'][1]['items']['items'][5].anchor);
        
        return result;
    }
});
//{/block}