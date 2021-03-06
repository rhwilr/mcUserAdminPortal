@extends('app')

@section('content')
    <div class="container">
        <div class="row"  data-ng-controller="RulesCtrl">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>TL;DR</b></div>
                    <div class="panel-body">
                        Try to minimize lag, don't be a jerk to other players, don't cheat, and you'll be fine.
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Game Rules</div>
                    <div class="panel-body">
                        <ul>
                            <li>Treat everyone with respect ingame and in the public chat.</li>
                            <li>Do not spam the chat. You will get muted. This includes yelling in caps.</li>
                            <li>Do not use any form of exploit. This includes duplication glitches.  If you use an exploit, you will be permanently banned.</li>
                            <li>Always tell staff if you have found a bug/exploit.</li>
                            <li>The server will not reimburse items lost in crashes/rollbacks or from lag.</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">PvP Rules</div>
                    <div class="panel-body">
                        <ul>
                            <li>This is a pvp server, so people will try and kill you. But, </li>
                            <li>If you want to fight someone, both parties have to agree on the fight. Otherwise it is counted as murder and you will get banned.</li>
                            <li>Traps in or around public areas are not allowed. Public areas include but are not limited to: shops (not necessarily your own),  public xp/mob farms, public roads. Using any method to kill players in public areas will result in a ban.</li>
                            <li>The Town is a public area and completely pvp free.</li>
                            <li>Traps around your home (if they are not near public areas) are allowed. Entering someones house is at your own risk.</li>
                            <li>It is completely forbidden to steal from someone or destroy items and other things which do not belong to you.</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Pranks</div>
                    <div class="panel-body">
                        <ul>
                            <li>Pranks are allowed, as long as no permanent damage is done to the other player or his buildings and items.</li>
                            <li>Always leave a sign with your name, stating yourself as the perpetrator.</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Farms and Mining</div>
                    <div class="panel-body">
                        <ul>
                            <li>Do not use automated quarries in the overworld. They are allowed as long as they do not destroy the landscape (replace mined blocks). Use the "Deep Dark" or a Mystcraft dimension for Quarrying.</li>
                            <li>Try to minimize mob farms, there are plenty of alternatives (Enderlilly instead of Enderman, Cotton farm instead of sheep).</li>
                            <li>If there is no alternative way to a mob farm, consider to build one in a community space and let everyone use them.</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Performance</div>
                    <div class="panel-body">
                        <ul>
                            <li>Do not lag out the server!</li>
                            <li>Builds which cost the Server a lot of resource and lag out the world will get removed.</li>
                            <li>If you do not know if a build will cause lag, ask other players or the staff.</li>
                            <li>Do only load chunks which are necessary.</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Patron</div>
                    <div class="panel-body">
                        <ul>
                            <li>If you are not a patron, do not use items/blocks which are only available to patrons. You will get banned.</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Agreement</h3>
                    </div>
                    <div class="panel-body">
                        <label>
                            <input type="checkbox"

                                   ng-model="user.rules_agreed"
                                   ng-change="changeRules()"> <b>I have read the above rules and agree to abide by them</b>
                        </label>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
