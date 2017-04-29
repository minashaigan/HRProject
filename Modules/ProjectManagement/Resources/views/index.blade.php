@extends('projectmanagement::layouts.master')
@section('title')
    Project Management
@stop
@section('content')
    <h1>Project Management</h1>

    <p>
        <ul>
            <li>Project</li>
                <ul>
                    <li><a href="/Projectmanage/project">Add Project</a></li>
                    <li><a href="/Projectmanage/project/show">Show Project</a> </li>
                </ul>
            <li><a href="/Projectmanage/task">Task</a> </li>
            <li><a href="/Projectmanage/Message">Message</a></li>
            <li><a href="/Projectmanage/Discussion">Discussion</a></li>
            <li><a href="/Projectmanage/Report">Report</a></li>
            <li><a href="/Projectmanage/Configuration">Configuration</a> </li>
        </ul>
    </p>
@stop
