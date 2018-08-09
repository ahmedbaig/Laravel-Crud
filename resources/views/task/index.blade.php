<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('task.header.index');
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Tasks
                </div>
                <div>
                  @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                  @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $key=>$task)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->body}}</td>
                                    <td>
                                        <a type="button" href="{{route('task.edit', $task->id)}}" class="btn btn-outline-secondary"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ2OS4zMzEgNDY5LjMzMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDY5LjMzMSA0NjkuMzMxOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCI+CjxnPgoJPHBhdGggZD0iTTQzOC45MzEsMzAuNDAzYy00MC40LTQwLjUtMTA2LjEtNDAuNS0xNDYuNSwwbC0yNjguNiwyNjguNWMtMi4xLDIuMS0zLjQsNC44LTMuOCw3LjdsLTE5LjksMTQ3LjQgICBjLTAuNiw0LjIsMC45LDguNCwzLjgsMTEuM2MyLjUsMi41LDYsNCw5LjUsNGMwLjYsMCwxLjIsMCwxLjgtMC4xbDg4LjgtMTJjNy40LTEsMTIuNi03LjgsMTEuNi0xNS4yYy0xLTcuNC03LjgtMTIuNi0xNS4yLTExLjYgICBsLTcxLjIsOS42bDEzLjktMTAyLjhsMTA4LjIsMTA4LjJjMi41LDIuNSw2LDQsOS41LDRzNy0xLjQsOS41LTRsMjY4LjYtMjY4LjVjMTkuNi0xOS42LDMwLjQtNDUuNiwzMC40LTczLjMgICBTNDU4LjUzMSw0OS45MDMsNDM4LjkzMSwzMC40MDN6IE0yOTcuNjMxLDYzLjQwM2w0NS4xLDQ1LjFsLTI0NS4xLDI0NS4xbC00NS4xLTQ1LjFMMjk3LjYzMSw2My40MDN6IE0xNjAuOTMxLDQxNi44MDNsLTQ0LjEtNDQuMSAgIGwyNDUuMS0yNDUuMWw0NC4xLDQ0LjFMMTYwLjkzMSw0MTYuODAzeiBNNDI0LjgzMSwxNTIuNDAzbC0xMDcuOS0xMDcuOWMxMy43LTExLjMsMzAuOC0xNy41LDQ4LjgtMTcuNWMyMC41LDAsMzkuNyw4LDU0LjIsMjIuNCAgIHMyMi40LDMzLjcsMjIuNCw1NC4yQzQ0Mi4zMzEsMTIxLjcwMyw0MzYuMTMxLDEzOC43MDMsNDI0LjgzMSwxNTIuNDAzeiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a>
                                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                          <button type="submit" class="btn btn-outline-danger"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDQ4Mi40MjggNDgyLjQyOSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDgyLjQyOCA0ODIuNDI5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTM4MS4xNjMsNTcuNzk5aC03NS4wOTRDMzAyLjMyMywyNS4zMTYsMjc0LjY4NiwwLDI0MS4yMTQsMGMtMzMuNDcxLDAtNjEuMTA0LDI1LjMxNS02NC44NSw1Ny43OTloLTc1LjA5OCAgICBjLTMwLjM5LDAtNTUuMTExLDI0LjcyOC01NS4xMTEsNTUuMTE3djIuODI4YzAsMjMuMjIzLDE0LjQ2LDQzLjEsMzQuODMsNTEuMTk5djI2MC4zNjljMCwzMC4zOSwyNC43MjQsNTUuMTE3LDU1LjExMiw1NS4xMTcgICAgaDIxMC4yMzZjMzAuMzg5LDAsNTUuMTExLTI0LjcyOSw1NS4xMTEtNTUuMTE3VjE2Ni45NDRjMjAuMzY5LTguMSwzNC44My0yNy45NzcsMzQuODMtNTEuMTk5di0yLjgyOCAgICBDNDM2LjI3NCw4Mi41MjcsNDExLjU1MSw1Ny43OTksMzgxLjE2Myw1Ny43OTl6IE0yNDEuMjE0LDI2LjEzOWMxOS4wMzcsMCwzNC45MjcsMTMuNjQ1LDM4LjQ0MywzMS42NmgtNzYuODc5ICAgIEMyMDYuMjkzLDM5Ljc4MywyMjIuMTg0LDI2LjEzOSwyNDEuMjE0LDI2LjEzOXogTTM3NS4zMDUsNDI3LjMxMmMwLDE1Ljk3OC0xMywyOC45NzktMjguOTczLDI4Ljk3OUgxMzYuMDk2ICAgIGMtMTUuOTczLDAtMjguOTczLTEzLjAwMi0yOC45NzMtMjguOTc5VjE3MC44NjFoMjY4LjE4MlY0MjcuMzEyeiBNNDEwLjEzNSwxMTUuNzQ0YzAsMTUuOTc4LTEzLDI4Ljk3OS0yOC45NzMsMjguOTc5SDEwMS4yNjYgICAgYy0xNS45NzMsMC0yOC45NzMtMTMuMDAxLTI4Ljk3My0yOC45Nzl2LTIuODI4YzAtMTUuOTc4LDEzLTI4Ljk3OSwyOC45NzMtMjguOTc5aDI3OS44OTdjMTUuOTczLDAsMjguOTczLDEzLjAwMSwyOC45NzMsMjguOTc5ICAgIFYxMTUuNzQ0eiIgZmlsbD0iIzAwMDAwMCIvPgoJCTxwYXRoIGQ9Ik0xNzEuMTQ0LDQyMi44NjNjNy4yMTgsMCwxMy4wNjktNS44NTMsMTMuMDY5LTEzLjA2OFYyNjIuNjQxYzAtNy4yMTYtNS44NTItMTMuMDctMTMuMDY5LTEzLjA3ICAgIGMtNy4yMTcsMC0xMy4wNjksNS44NTQtMTMuMDY5LDEzLjA3djE0Ny4xNTRDMTU4LjA3NCw0MTcuMDEyLDE2My45MjYsNDIyLjg2MywxNzEuMTQ0LDQyMi44NjN6IiBmaWxsPSIjMDAwMDAwIi8+CgkJPHBhdGggZD0iTTI0MS4yMTQsNDIyLjg2M2M3LjIxOCwwLDEzLjA3LTUuODUzLDEzLjA3LTEzLjA2OFYyNjIuNjQxYzAtNy4yMTYtNS44NTQtMTMuMDctMTMuMDctMTMuMDcgICAgYy03LjIxNywwLTEzLjA2OSw1Ljg1NC0xMy4wNjksMTMuMDd2MTQ3LjE1NEMyMjguMTQ1LDQxNy4wMTIsMjMzLjk5Niw0MjIuODYzLDI0MS4yMTQsNDIyLjg2M3oiIGZpbGw9IiMwMDAwMDAiLz4KCQk8cGF0aCBkPSJNMzExLjI4NCw0MjIuODYzYzcuMjE3LDAsMTMuMDY4LTUuODUzLDEzLjA2OC0xMy4wNjhWMjYyLjY0MWMwLTcuMjE2LTUuODUyLTEzLjA3LTEzLjA2OC0xMy4wNyAgICBjLTcuMjE5LDAtMTMuMDcsNS44NTQtMTMuMDcsMTMuMDd2MTQ3LjE1NEMyOTguMjEzLDQxNy4wMTIsMzA0LjA2Nyw0MjIuODYzLDMxMS4yODQsNDIyLjg2M3oiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /></button>
                                      </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a type="button" href="{{route('task.create')}}" class="btn btn-outline-success"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ2OS43MDYgNDY5LjcwNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDY5LjcwNiA0NjkuNzA2OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQyNi4xOSwxMTUuMjVjLTAuMDM2LTAuNTI1LTAuMTMxLTEuMDMyLTAuMzA0LTEuNTMzYy0wLjA3Mi0wLjE5MS0wLjExOS0wLjM3Ni0wLjE5Ny0wLjU2MSAgICBjLTAuMjkyLTAuNjMyLTAuNjU2LTEuMjM1LTEuMTY5LTEuNzQ4TDMxNC44NiwxLjc0OGMtMC41MTMtMC41MDctMS4xMTYtMC44NzctMS43NDgtMS4xNjRjLTAuMTg1LTAuMDktMC4zNzYtMC4xMzctMC41NjEtMC4yMDMgICAgYy0wLjUwMS0wLjE2Ny0xLjAxNC0wLjI2OS0xLjUzOS0wLjMwNEMzMTAuODg2LDAuMDcyLDMxMC43NjcsMCwzMTAuNjM1LDBIMTM2LjQ4NmMtMy4yOTQsMC01Ljk2NywyLjY3My01Ljk2Nyw1Ljk2N3Y5MS44NTQgICAgSDQ5LjQwNmMtMy4yOTQsMC01Ljk2NywyLjY3My01Ljk2Nyw1Ljk2N3YzNTkuOTUxYzAsMy4zLDIuNjczLDUuOTY3LDUuOTY3LDUuOTY3SDMzMy4yMmMzLjI5NCwwLDUuOTY3LTIuNjY3LDUuOTY3LTUuOTY3di05MS44NTQgICAgSDQyMC4zYzMuMjk0LDAsNS45NjctMi42NjcsNS45NjctNS45NjdWMTE1LjYyNkM0MjYuMjY3LDExNS40OTUsNDI2LjIwMiwxMTUuMzc1LDQyNi4xOSwxMTUuMjV6IE00MDUuODk2LDEwOS42NTloLTg5LjI4OFYyMC4zNzEgICAgTDQwNS44OTYsMTA5LjY1OXogTTMyNy4yNTMsNDU3Ljc2Nkg1NS4zNzNWMTA5Ljc1NWg4MS4xMTRoODEuMTA4djEwMy42OTJjMCwzLjI5NCwyLjY3Myw1Ljk2Nyw1Ljk2Nyw1Ljk2N2gxMDMuNjkydjE0Ni41MDUgICAgVjQ1Ny43NjZ6IE0yMjkuNTI4LDExOC4xOTJsODkuMjg4LDg5LjI4OGgtODkuMjg4VjExOC4xOTJ6IE0zMzkuMTg3LDM1OS45NTFWMjEzLjQ0N2MwLTAuMTMxLTAuMDY2LTAuMjUxLTAuMDc4LTAuMzc2ICAgIGMtMC4wMzYtMC41MjUtMC4xMzEtMS4wMzItMC4zMDQtMS41MzNjLTAuMDcyLTAuMTkxLTAuMTE5LTAuMzc2LTAuMTk3LTAuNTYxYy0wLjI5Mi0wLjYzMi0wLjY1Ni0xLjIzNS0xLjE2OS0xLjc0OCAgICBMMjI3Ljc3OSw5OS41NjljLTAuNTEzLTAuNTEzLTEuMTE2LTAuODc3LTEuNzQ4LTEuMTdjLTAuMTg1LTAuMDg0LTAuMzctMC4xMzEtMC41NjEtMC4xOTdjLTAuNTAxLTAuMTczLTEuMDA4LTAuMjc0LTEuNTM5LTAuMzA0ICAgIGMtMC4xMjUtMC4wMDYtMC4yNDUtMC4wNzgtMC4zNzYtMC4wNzhoLTgxLjEwMlYxMS45MzRoMTYyLjIyMXYxMDMuNjkyYzAsMy4yOTQsMi42NjcsNS45NjcsNS45NjcsNS45NjdoMTAzLjY5MnYyMzguMzU5SDMzOS4xODd6ICAgICIgZmlsbD0iIzAwMDAwMCIvPgoJCTxwb2x5Z29uIHBvaW50cz0iMTk3LjI4MywyMzUuMjggMTg1LjM0OSwyMzUuMjggMTg1LjM0OSwyNzcuNzk0IDE0Mi44MzUsMjc3Ljc5NCAxNDIuODM1LDI4OS43MjcgICAgIDE4NS4zNDksMjg5LjcyNyAxODUuMzQ5LDMzMi4yNDEgMTk3LjI4MywzMzIuMjQxIDE5Ny4yODMsMjg5LjcyNyAyMzkuNzk3LDI4OS43MjcgMjM5Ljc5NywyNzcuNzk0IDE5Ny4yODMsMjc3Ljc5NCAgICIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a>

                </div>
            </div>
        </div>
    </body>
    <footer>
        @include('task.footer.index');
    </footer>
</html>
