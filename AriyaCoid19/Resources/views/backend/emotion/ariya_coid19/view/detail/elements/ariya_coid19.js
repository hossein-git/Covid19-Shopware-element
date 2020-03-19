//
//{block name="backend/emotion/view/detail/elements/base"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.Emotion.view.detail.elements.AriyaCoid19', {

    extend: 'Shopware.apps.Emotion.view.detail.elements.Base',

    alias: 'widget.detail-element-emotion-components-ariya-coid19',

    componentCls: 'emotion-coid19',

    icon: 'https://p3cdn4static.sharpschool.com/UserFiles/Servers/Server_1051846/Image/News/coronavirus.png',
    createPreview: function() {
        var me = this,
            preview = '',
            image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcReSnvaKuDyr2vloxWChYMG2g3eEpylx8uqcP-jMSNhT2RZa6DI',
            position = me.getConfigValue('bannerPosition') || 'center center',
            style;

        if (Ext.isDefined(image)) {
            style = Ext.String.format('background-image: url([0]); background-position: [1]; background-size: contain', image, position);

            preview = Ext.String.format('<div class="x-emotion-banner-element-preview" style="[0]"></div>', style);
        }

        return preview;
    }

});
//{/block}