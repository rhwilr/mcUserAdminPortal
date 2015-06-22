@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>Map</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">Border</div>
                    <div class="panel-body">
                        <p>The <b>overworld</b> is pregenerated and has a size of 12'000 x 12'000 Blocks. There is a border around the world. Do not leave this border.</p>
                        <p>Other Dimentions:
                        <ul>
                            <li>
                                <b>Nether:</b>
                                <p>Pregenerated Size:  1'500 x 1'500</br>
                                Border:             Yes</p>
                            </li>
                            <li>
                                <b>Twilight Forrest:</b>
                                <p>Pregenerated Size:  3'000 x 3'000</br>
                                    Border:             No</p>
                            </li>
                            <li>
                                <b>Deep Dark:</b>
                                <p>Pregenerated Size:  3'000 x 3'000</br>
                                    Border:             No</p>
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Online-Map</div>
                    <div class="panel-body">
                        <p>The <b><a href="http://map.rhwilr.ch" target="_blank">Online-map</a></b> updates live while players are walking around and building.</p>
                        <p>Due to the enormous amount of resources it takes to render a map this large, it can sometimes take a long time to update new blocks.</p>
                        <p><b>Tip:</b> You can hide yourselfe from the map by sneeking, drinking a potion of invisibility or if your underground.</p>
                    </div>
                </div>

                <h1>Patron Features</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">Chunkloader</div>
                    <div class="panel-body">
                        <p>Chunkloader from the Chicken-Chunk Mod are only available to you if you are a patron.</br>
                        But you can still use chunkloaders from other mods, even if you are not a patron.</p>
                        Other possible chunkloaders:
                        <ul>
                            <li>MFR Chunkloader (uses Mobessence)</li>
                            <li>Railcraft Worldanchor (uses Enderpearls)</li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Mystcraft / RF-Tools</div>
                    <div class="panel-body">
                        <p>The generation of additional dimmentions can put a lot of load onto the server. Therefore these mods are only available to patrons.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
