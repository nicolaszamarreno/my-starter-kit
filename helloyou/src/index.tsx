import { Store } from "./store/store";
import "./assets/less/main.less";
import { HomeView } from "./views/home";
import ReactDOM = require("react-dom");
import { Provider } from "mobx-react";
import React = require("react");
const StoreApp = new Store();

const stores = {
    store: StoreApp
};

ReactDOM.render(
    <Provider {...stores}>
        <HomeView />
    </Provider>,
    document.getElementById("app")
);
