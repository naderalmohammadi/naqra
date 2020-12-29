@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                        <a class="navbar-brand" href="#">article Details</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                        aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent1">



                            {{-- start of buttons --}}
                    <span class="navbar-nav ml-auto">
                        <button class="btn btn-sm btn-primary" id="reset">Reset</button>
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right mx-2" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-cog"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- Modal body --}}
          <form>
            <div class="form-group">
                <label for="method">Method: </label>
                  <select class="form-control" id="method">
                    <option disabled selected value> -- select reading method -- </option>
                    <option value="word">Word by word</option>
                    <option id="highlight" value="highlight">Letter by letter</option>
                    <option id="highlightOver" value="highlightOver">Highlight over text</option>
                  </select>
            </div>
            <div class="form-group">
                <label for="textSize">Text size: </label>
                  <select class="form-control" id="textSize">
                    <option disabled selected value> -- select text size -- </option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="14">14</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                    <option value="20">20</option>
                  </select>
            </div>
            <div id="wordFormGroup" class="form-group">
                <label for="wordSpeed">speed: </label>
                  <select class="form-control" id="wordSpeed">
                    <option disabled selected value> -- select words speed -- </option>
                    <option value="1200">50 wpm</option>
                    <option value="600">100 wpm</option>
                    <option value="400">150 wpm</option>
                    <option value="300">200 wpm</option>
                    <option value="240">250 wpm</option>
                    <option value="200">300 wpm</option>
                  </select>
            </div>
            <div id="highlightFormGroup" class="form-group d-none">
                <label for="highlightSpeed">speed: </label>
                  <select class="form-control" id="highlightSpeed">
                    <option disabled selected value> -- select words speed -- </option>
                    <option value="1200">50 wpm</option>
                    <option value="600">100 wpm</option>
                    <option value="400">150 wpm</option>
                    <option value="300">200 wpm</option>
                    <option value="240">250 wpm</option>
                    <option value="200">300 wpm</option>
                  </select>
            </div>
            <div id="textColor" class="form-group d-none">
                <label for="color">Color: </label>
                <select class="form-control" id="color">
                    <option disabled selected value> -- select text color -- </option>
                    <option  value="red">Red</option>
                    <option value="black">Black</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                  </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main.close')}}</button>
        </div>
      </div>
    </div>
  </div>

                        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-undo"></i> Back to Overview</a>
                    </span>
                            {{-- End of buttons --}}


                        </div>
                      </nav>

                <div class="card-body">
                    <b>{{$article->title}}</b>
                <hr>


                <div id="text" class="card-text">
                    {{-- <div id="shadow">{{$article->content}}</div>
                    <div id="content"></div> --}}
                    <div style="position: relative">
                    <div id="shadow" style="position: absolute;left:0"></div>
                    <div id="content" style="z-index:-1;left:0">{{$article->content}}</div>
                    </div>
                </div>
                </div>
            </div>
            <button id="save" class="btn btn-primary">Save</button>
                        {{-- <div><i class="fas fa-info-circle"></i> First, set your settings preferences <i class="fas fa-cog"></i> .</div>
            <div><i class="fas fa-info-circle"></i> Tab once on text to start, tab again to pause.</div>
            <div><i class="fas fa-info-circle"></i> Method change, and color change will reset reading.</div> --}}
        </div>
    </div>
</div>
@endsection



<script>
    // let article = {!! json_encode($article->content)!!};
    let articleObj = {{$article->id}};
</script>
