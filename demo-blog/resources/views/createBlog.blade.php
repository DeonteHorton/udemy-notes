@extends('layouts.app')
@section('content')
<div className='form-wrapper'>
    <div className='container'>
        <div className='row'>
            <div className='col-sm-12'>
                <div className='form-box'>
                    <form onSubmit={this.publish_blog} id='blog-form'>
                        <h2>Enter Blog Title in the input field below</h2>
                        <input type='text' placeholder='Title here' id='blog-title'/>
                        <h2>Enter your Blog in the input field below</h2>
                        <textarea className="space" cols="50" rows="5" id='blog-text' placeholder="This is how my day was......"></textarea>
                        <br/>
                        <input type='submit' className='null btn btn-primary' value='Publish' />
                    </form>
                    <a style={margin} className='btn btn-primary' to='/blog'>Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection