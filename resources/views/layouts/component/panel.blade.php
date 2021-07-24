
<div class="box box-{{ @$Color?$Color:env('TABPANELCOLOR') }}">
    @if(@$Title || @$Button)
        <div class="box-header with-border">
            <div class="box-tools pull-right">
               {{ @$Button }}
            </div>
        </div>
    @endif
    <div class="box-body">
        {{ $slot }}
    </div>
</div>
