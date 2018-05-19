import VueRouter from "vue-router";

let routes=[

    {
         path:'/example',
         component:require('./components/ExampleComponent')

    },
    {
         path:'/user',
         component:require('./components/UserComponent')
    },
    {
         path:'/',
         component:require('./components/TaskComponent')
    }
];

export default new VueRouter({
    mode:"history",
    routes
});