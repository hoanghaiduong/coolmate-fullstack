// import * as UserService from "../../services/UserService";
import {
  logFailure,
  logStart,
  logSuccess,
} from "./authSlice";

export const signIn = (email, password, navigate) => async (dispatch) => {
    dispatch(logStart());
    try {
        //call api
        // const response = await UserService.userLogin(email, password);
        if (response.status === true) {
        dispatch(logSuccess(response));
        } else 
            dispatch(logFailure(response));
    } catch (err) {
        dispatch(logFailure({ error: true, message: err.message }));
        
    }

};

export const signUp = (email, password, today, navigate) => async (dispatch) => {
    dispatch(logStart());
    try {
        //call api
        // const response = await UserService.signupUser(email, password, today);
        if (response.status === true) {
            dispatch(logSuccess(response));
            navigate("/");
        } else 
            dispatch(logFailure(response));
    } catch (err) {
        console.log(err);
        dispatch(logFailure({ error: true, message: err.message }));
    }
};
  


