@extends('app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Usage & Registration</div>
                    <div class="panel-body">
                        <p>Mumble is an open source, low-lantency, high quality voice chat software primarly intended for use while gaming. You can download for free!</p>
                        <p>The Mumble Client software is required to connect to a Mumble Server.</p>

                        <p><a href="http://wiki.mumble.info/wiki/Main_Page" target="_blank">Download the Mumble Client from here</a></p>
                        </br>
                        <p>Your free to use the Mumble-Server with all your Friends.</p>
                        <p>When you first join the Server you will be thrown into the <b>Registration</b> channel. You cannot move yourself to an other channel until an <b>Officer</b> has talked to you and approves your account.</p>
                    </div>

                </div>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Channels</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="30%">Channel</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b>==={ Registration }===</b></td>
                                <td>Default Channel for every new Person. New Users cannot change the channel unless a <b>Officer</b> has registered them. </td>
                            </tr>
                            <tr>
                                <td><b>==={ Lobby }===</b></td>
                                <td>This channel is for all the casual talk. In here all <b>Members</b> have rights to create a temporary channel. Temporary channels will be deleted when the last person leaves.</td>
                            </tr>
                            <tr>
                                <td><b>==={ Games }===</b></td>
                                <td>As it says: this is for gaming. Pretty obvious. Every game gets its own channel. If you want a channel for a different game, just ask.</td>
                            </tr>
                            <tr>
                                <td><b>==={ Private Channels }===</b></td>
                                <td><p>Here are Private channels located. You cannot enter these channels. Only the Person owning the channel can move other People into their channel.</p>
                                    <p>If you want your own private channel, ask me.</p></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>


            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">How to connect</div>
                    <div class="panel-body">

                        Use the following Server:
                        <table class="table">
                            <tbody>
                            <tr>
                                <td><b>Server</b></td>
                                <td>mumble.rhwilr.ch</td>
                            </tr>
                            <tr>
                                <td><b>Port</b></td>
                                <td>64738 (default)</td>
                            </tr>
                            </tbody>
                        </table>

                        You have to have a valid certificate and provide a username.
                        You cannot change your username once you have registered on the server.

                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Officer Rank</div>
                    <div class="panel-body">
                        <p>Everyone who is frequently using the Mumble Server can become an Officer. If you want to invite your Friends you have to be an Officer to register them, if no one else is online.</p>
                        <p>If you feel like you should be an Officer, contact me.</p>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
