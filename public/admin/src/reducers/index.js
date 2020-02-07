//用于合并多个reducer
import { combineReducers } from "redux";
import user from "./user.js";

export default combineReducers({
    user
});
