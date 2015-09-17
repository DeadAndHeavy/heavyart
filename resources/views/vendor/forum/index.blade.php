@extends('forum::layouts.master')

@section('content')
@include('forum::partials.breadcrumbs')

<h2>{{ trans('forum::base.index') }}</h2>

<table class="table table-index">
    <thead>
        <tr>
            <th>{{ trans('forum::base.category') }}</th>
            <th>{{ trans('forum::base.threads') }}</th>
            <th>{{ trans('forum::base.posts') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>
                    <p class="lead"><a href="{{ $category->route }}">{{ $category->title }}</a></p>
                    {{ $category->subtitle }}

                    @if ($category->newestThread)
                    <div class="text-muted">
                        <br>
                        {{ trans('forum::base.newest_thread') }}:
                        <a href="{{ $category->newestThread->route }}">
                            {{ $category->newestThread->title }}
                            ({{ $category->newestThread->authorName }})</a>
                        <br>
                        {{ trans('forum::base.last_post') }}:
                        <a href="{{ $category->latestActiveThread->lastPost->route }}">
                            {{ $category->latestActiveThread->title }}
                            ({{ $category->latestActiveThread->lastPost->authorName }})</a>
                    </div>
                    @endif
                </td>
                <td class="text-center table-counter">{{ $category->threadCount }}</td>
                <td class="text-center table-counter">{{ $category->postCount }}</td>
            </tr>
            @if (!$category->subcategories->isEmpty())
            <tr>
                <td>{{ trans('forum::base.subcategories') }}</td>
                <th>{{ trans('forum::base.threads') }}</th>
                <th>{{ trans('forum::base.posts') }}</th>
            </tr>
            @foreach ($category->subcategories as $subcategory)
            <tr>
                <td>
                    <a href="{{ $subcategory->route }}">{{ $subcategory->title }}</a>
                    <br>
                    {{ $subcategory->subtitle }}
                    @if ($subcategory->newestThread)
                    <div class="text-muted">
                        <br>
                        {{ trans('forum::base.newest_thread') }}:
                        <a href="{{ $subcategory->newestThread->route }}">
                            {{ $subcategory->newestThread->title }}
                            ({{ $subcategory->newestThread->authorName }})</a>
                        <br>
                        {{ trans('forum::base.last_post') }}:
                        <a href="{{ $subcategory->latestActiveThread->lastPost->route }}">
                            {{ $subcategory->latestActiveThread->title }}
                            ({{ $subcategory->latestActiveThread->lastPost->authorName }})</a>
                    </div>
                    @endif
                </td>
                <td>{{ $subcategory->threadCount }}</td>
                <td>{{ $subcategory->postCount }}</td>
            </tr>
            @endforeach
            @endif
        @endforeach
    </tbody>
</table>
@overwrite
