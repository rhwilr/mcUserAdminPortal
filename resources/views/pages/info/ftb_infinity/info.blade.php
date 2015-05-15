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



                <h1>Patron Features</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">Chunkloader</div>
                    <div class="panel-body">
                        <p>Chunkloader from the Chicken-Chunk Mod are only available to you if you are a patron.</br>
                        But you can still use chunkloaders from other mods, even if you are not a patron.</p>
                        Other possible chunkloaders:
                        <ul>
                            <li></li>
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
