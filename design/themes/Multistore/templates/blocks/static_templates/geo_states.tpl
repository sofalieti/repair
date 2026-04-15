{assign var="geo_data" value=""|fn_get_geo_data}
{if $geo_data != false}
    <div class="geo-states">
        <div class="l-title">Select your state:</div>
        <a href="#" data-toggle="modal" data-target="#selectState">{$geo_data['country_name']|replace:"United States":"USA"}, {$geo_data['region_name']}</a>

        <div class="modal fade" id="selectState" tabindex="-1" role="dialog" aria-labelledby="selectStateLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="selectStateLabel">Select State</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="statesTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="usa-tab" data-toggle="tab" data-target="#usa" role="tab" aria-controls="usa" aria-selected="true">USA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="canada-tab" data-toggle="tab" data-target="#canada" role="tab" aria-controls="canada" aria-selected="false">Canada</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="statesTabContent">
                            <div class="tab-pane fade show active" id="usa" role="tabpanel" aria-labelledby="usa-tab">
                                <div class="row">
                                    <div class="col-4">
                                        {foreach from="US"|fn_get_geo_states item=state_name key=state_code name=states}
                                            {if ($smarty.foreach.states.index+1) % 16 == 0}
                                            </div><div class="col-4">
                                            {/if}
                                            <a href="#" data-state-code="{$state_code}"  data-domain="https://repairmysauna.com">{$state_name}</a>
                                        {/foreach}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="canada" role="tabpanel" aria-labelledby="canada-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        {foreach from="CA"|fn_get_geo_states item=state_name key=state_code name=states}
                                            <a href="#" data-state-code="{$state_code}" data-domain="https://repairmysauna.com">{$state_name}</a><br/>
                                        {/foreach}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/tygh/tabs.js"></script>
    <noindex>
        <form action="" method="post" id="geo_state_form" style="display: none;">
            <input type="hidden" name="geo_state" value=""/>
            <button type="submit"></button>
        </form>
    </noindex>
    {literal}
        <script type="text/javascript">
            $(document).ready(function () {
                $('#selectState .tab-content a').click(function () {
                    var state_code = $(this).attr('data-state-code');
                    var domain = $(this).attr('data-domain');
                    var action = domain + '/index.php?dispatch=geo.change_state';
                    $('#geo_state_form input').val(state_code);
                    $('#geo_state_form').attr('action', action);
                    $('#geo_state_form').submit();
                    return false;
                });
            });
        </script>
    {/literal}
{/if}



