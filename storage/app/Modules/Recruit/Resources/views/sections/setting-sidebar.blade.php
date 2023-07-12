@if (user()->permission('recruit_settings') != 'none')
    <x-setting-menu-item :active="$activeMenu" menu="recruit_settings" :href="route('recruit-settings.index')" :text="__('recruit::app.menu.recruitSetting')" />
@endif
