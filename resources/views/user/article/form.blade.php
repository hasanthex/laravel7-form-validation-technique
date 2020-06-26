@extends('layouts.app')

@section('content')
<style>
    .error{
        border: 1px salmon solid;
    }    
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>
                <div class="card-body">
                     <ol>
                        @foreach ($articles as $item)
                            <li>
                                <a href="{{ route('edit.article', ['id'=> $item->id]) }}">{{ $item->title }}</a>    
                                <a href="{{ route('delete.article', ['id' => $item->id]) }}"> X </a>
                            </li>    
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Article</div>
                
               {{-- Display Alert Messages --}}
               @include('sub-view.alert')

                <div class="card-body">
                    <form method="post" action="{{ route('article.add', ['id' => $article->id]) }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input 
                                    type="text" 
                                    class="form-control @error('title') error @enderror" 
                                    placeholder="Article Title" 
                                    name="title"
                                    value="{{ old('title', $article->title) }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="details">Describe</label>
                                <textarea 
                                        class="form-control @error('details') error @enderror" 
                                        id="details" 
                                        rows="3" 
                                        name="details">{{ old('details', $article->details) }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Submit"/>
                            </div>

                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
