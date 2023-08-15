<div class="markdown prose w-full break-words dark:prose-invert light">
    <h1>Todo List API</h1>
    <p>This is the API documentation for managing tasks in a todo list.</p>
    <h2>User Registration</h2>
    <p>Register a new user in the system.</p>
    <h3>Request</h3>
    <pre><div class="bg-black rounded-md mb-4"><div
                class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">POST /api/auth/register
Accept: application/json
Content-Type: application/json

{
"email": "test@gmail.com",
"password": "Test122234",
"password_confirmation": "Test122234",
"name": "Test User Name"
}
</code></div></div></pre>
<h2>User Login</h2>
<p>Authenticate a user to access other API functionalities.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">POST /api/auth/login
Accept: application/json
Content-Type: application/json

{
"email": "cHaly95@gmail.com",
"password": "1Qwerty@"
}
</code></div></div></pre>
<h2>User Logout</h2>
<p>Log out an authenticated user from the system.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">DELETE /api/auth/logout
Accept: application/json
Content-Type: application/json
Authorization: Bearer &lt;token&gt;
</code></div></div></pre>
<h2>Get User Data</h2>
<p>Retrieve information about the authenticated user.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">GET /api/user
Accept: application/json
Authorization: Bearer &lt;token&gt;
</code></div></div></pre>
<h2>Create New Task</h2>
<p>Create a new task in the todo list.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">POST /api/task/
Accept: application/json
Content-Type: application/json
Authorization: Bearer &lt;token&gt;

{
"parentId": 1,
"priority": 2,
"title": "Test122234",
"description": "Test User Name",
"completedAt": "2023-08-14 10:18:05"
}
</code></div></div></pre>
<h2>Get Task List</h2>
<p>Retrieve a list of tasks with filtering and pagination options.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">GET /api/task/
Accept: application/json
Content-Type: application/json
Authorization: Bearer &lt;token&gt;

{
"status": "todo",
"priority_from": 2,
"priority_to": 2,
"title": "Test",
"sort_by": "created_at",
"page": 1,
"limit": 15
}
</code></div></div></pre>
<h2>Get Task by ID</h2>
<p>Retrieve information about a specific task by its identifier.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">GET /api/task/&lt;id&gt;
Accept: application/json
Content-Type: application/json
Authorization: Bearer &lt;token&gt;
</code></div></div></pre>
<h2>Delete Task by ID</h2>
<p>Delete a task by its identifier.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">DELETE /api/task/&lt;id&gt;
Accept: application/json
Content-Type: application/json
Authorization: Bearer &lt;token&gt;
</code></div></div></pre>
<h2>Update Task Status</h2>
<p>Update the status of a task by its identifier.</p>
<h3>Request</h3>
<pre><div class="bg-black rounded-md mb-4"><div
class="p-4 overflow-y-auto"><code class="!whitespace-pre hljs language-http">PATCH /api/task/status/&lt;id&gt;
Accept: application/json
Content-Type: application/json
Authorization: Bearer &lt;token&gt;

{
"status": "done"
}
</code></div></div></pre>
<h3>Technologies Used</h3>
<p>This API is built using the following technologies:</p>
<ul>
<li><strong>Laravel</strong>: A powerful PHP framework for web application development.</li>
<li><strong>MySQL</strong>: A popular relational database management system for data storage and retrieval.</li>
<li><strong>Docker</strong>: A containerization platform used for creating, deploying, and running applications
in isolated environments.
</li>
</ul>
<p>Feel free to use these API endpoints to interact with your todo list application.</p></div>
