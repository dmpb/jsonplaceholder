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
            <p class="mb-2 text-xl text-white">The word manages the data.</p>
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
                JSONPlaceholder comes with a set of 6 common resources:
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
                            <Link
                                :href="route('users.index')"
                                class="text-blue-600"
                                >/users</Link
                            >
                        </td>
                        <td>10 users</td>
                    </tr>
                    <tr>
                        <td>
                            <Link
                                :href="route('posts.all')"
                                class="text-blue-600"
                                >/posts</Link
                            >
                        </td>
                        <td>100 posts</td>
                    </tr>
                    <tr>
                        <td>
                            <Link
                                :href="route('comments.all')"
                                class="text-blue-600"
                                >/comments</Link
                            >
                        </td>
                        <td>500 comments</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="px-3 my-16">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold">Routes</h2>
            <p class="mb-4">
                All HTTP methods are supported. You can use http or https for
                your requests.
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
                        <td>GET</td>
                        <td>
                            <Link
                                :href="route('users.index')"
                                class="text-blue-600"
                                >/users</Link
                            >
                        </td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>
                            <Link
                                :href="route('users.show', { user: 1 })"
                                class="text-blue-600"
                                >/users/1</Link
                            >
                        </td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td>
                            <Link
                                :href="route('posts.comments.index', { post: 1 })"
                                class="text-blue-600"
                                >/posts/1/comments</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
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
    },

    setup() {
        const tryitCode =
            ref(`fetch('https://jsonplaceholder.typicode.com/todos/1')
  .then(response => response.json())
  .then(json => console.log(json))`);

        const tryitResultCode = ref(`{}`);

        const changeTryitResultCode = () => {
            tryitResultCode.value = `{
	"userId": 1,
	"id": 1,
	"title": "delectus aut autem",
	"completed": false
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
