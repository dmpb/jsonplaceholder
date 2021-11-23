<template>
    <pre><code class="rounded-md hljs" v-html="data"></code></pre>
</template>

<script>
import { onMounted, toRefs, ref, watch } from "vue";

export default {
    props: {
        language: {
            type: String,
            require: true,
        },
        code: {
            type: String,
            require: true,
        },
    },

    setup(props) {
        const { code, language } = toRefs(props);
        const data = ref(null);

        const renderHighlightedData = () => {
            const hljs = require("highlight.js/lib/common");

            const highlightedData = hljs.highlight(code.value, {
                language: language.value,
            }).value;

            data.value = highlightedData;
        };

        onMounted(renderHighlightedData);

        watch(code, renderHighlightedData);

        return {
            data,
        };
    },
};
</script>
