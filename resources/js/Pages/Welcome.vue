<template>
    <Head title="Welcome" />

    <div class="px-3 bg-white">
        <div class="container relative flex justify-between py-5 mx-auto">
            <h1 class="font-bold text-blue-600">JSONPlaceholder</h1>
            <div class="flex" v-if="canLogin">
                <Link
                    v-if="$page.props.user"
                    :href="route('dashboard')"
                    class="text-blue-600"
                >
                    {{ user.name }}
                </Link>
                <template v-else>
                    <Link :href="route('login')" class="text-blue-600">
                        Login
                    </Link>
                </template>
            </div>
        </div>
    </div>
    <div class="px-3 bg-blue-600 py-36">
        <div class="container mx-auto">
            <p class="mb-8 text-6xl font-bold text-white">
                <span>{JSON}</span> <span>Placeholder</span>
            </p>
            <p class="mb-2 text-xl text-white">The world is managed by data.</p>
            <p class="mb-4 text-xl text-white">
                We provide you with false data for your tests.
            </p>
            <p class="text-white">
                As of Nov 2021, <span class="font-bold">serving</span>
            </p>
        </div>
    </div>

    <div class="px-3 my-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold">Try it</h2>
            <p class="mb-4">
                Run this code here, in a console or from any site:
            </p>
            <Highlightjs
                class="mb-6"
                language="javascript"
                :code="tryitCode"
            ></Highlightjs>
            <button
                class="px-3 py-2 mb-6 text-white bg-green-500 rounded-md hover:bg-green-400"
                @click="changeTryitResultCode()"
            >
                Run script
            </button>
            <Highlightjs
                class="mb-6"
                language="json"
                :code="tryitResultCode"
            ></Highlightjs>
        </div>
    </div>

    <div class="px-3 my-16">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold">Resources</h2>
            <p class="mb-4">
                JSONPlaceholder comes with a set of 4 common resources:
            </p>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="w-32"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a
                                :href="route('users.index')"
                                class="text-blue-600"
                                >/users</a
                            >
                        </td>
                        <td>{{ usersQuantity }} users</td>
                    </tr>
                    <tr>
                        <td>
                            <a :href="route('posts.all')" class="text-blue-600"
                                >/posts</a
                            >
                        </td>
                        <td>{{ postsQuantity }} posts</td>
                    </tr>
                    <tr>
                        <td>
                            <a
                                :href="route('comments.all')"
                                class="text-blue-600"
                                >/comments</a
                            >
                        </td>
                        <td>{{ commentsQuantity }} comments</td>
                    </tr>
                    <tr>
                        <td>
                            <a :href="route('todos.all')" class="text-blue-600"
                                >/todos</a
                            >
                        </td>
                        <td>{{ todosQuantity }} todos</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="px-3 my-16">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold">Routes</h2>
            <p class="mb-4">All HTTP methods are supported.</p>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="w-32"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-bold text-green-500">GET</td>
                        <td>
                            <a
                                :href="route('users.index')"
                                class="text-blue-600"
                                >/users</a
                            >
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold text-green-500">GET</td>
                        <td>
                            <a
                                :href="
                                    route('posts.comments.index', { post: 1 })
                                "
                                class="text-blue-600"
                                >/posts/1/comments</a
                            >
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold text-yellow-500">POST</td>
                        <td>
                            <p>/users/1/todos</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold text-blue-500">PUT</td>
                        <td>
                            <p>/todos/1</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold text-red-500">DELETE</td>
                        <td>
                            <p>/todos/1</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="px-3 my-16">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold">Documentation</h2>
            <p class="mb-4">
                To know all the documentation of the routes you can see our
                repository in
                <a
                    target="_blank"
                    class="text-yellow-500 hover:text-yellow-400"
                    href="https://documenter.getpostman.com/view/8414406/UVJZoJ7f"
                    >Postman</a
                >.
            </p>
        </div>
    </div>

    <footer class="px-3 py-4 text-center">
        <p>Created with ❤️ by Daniel Ponce</p>
        <a
            href="https://github.com/dmpb"
            target="_blank"
            class="text-blue-600 hover:text-blue-400"
            >My Github</a
        >
    </footer>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import Highlightjs from "./../Components/highlightjs.vue";

export default defineComponent({
    components: {
        Head,
        Link,
        Highlightjs,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
        user: Object,
        usersQuantity: Number,
        postsQuantity: Number,
        commentsQuantity: Number,
        todosQuantity: Number,
        url: String,
    },

    setup(props) {
        const tryitCode = ref(`fetch('${props.url}/api/todos/1')
  .then(response => response.json())
  .then(json => console.log(json))`);

        const tryitResultCode = ref(`{}`);

        const changeTryitResultCode = () => {
            tryitResultCode.value = `{
    "data": {
        "id": 13,
        "user_id": 14,
        "title": "Amet enim mollitia rem.",
        "completed": 1,
        "created_at": "2021-11-24T14:12:25.000000Z"
    }
}`;
        };

        return {
            tryitCode,
            tryitResultCode,
            changeTryitResultCode,
        };
    },
});
</script>
