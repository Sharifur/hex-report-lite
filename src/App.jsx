import MainLayoutContainer from "./components/Dashboard/MainLayoutContainer";
import {BrowserRouter, Route, Routes} from "react-router-dom";
import "./assets/scss/main.scss";
import "line-awesome/dist/line-awesome/css/line-awesome.min.css";
import AccountSettings from "./pages/account-settings";
import Dashboard from "./components/Page/Dashboard";
import ByProduct from "./pages/sales/by-product";
import ByCategories from "./pages/sales/by-categories";
// import Sales from "./pages/sales/by-channel";
export default function App() {
	const windowLocation = window.location.pathname;
	// this will remove everything after .php
	let url = windowLocation.replace(/\.php\/.*$/, '.php');



	return (
		<BrowserRouter basename={url}>
			<div className="reportGenixMainArea">
				{/*<Sidebar searchParam={windowParams} />*/}
				<MainLayoutContainer>
					<Routes>
						{/*<Route element={<Dashboard/>} path="/"/>*/}
						<Route element={<ByProduct />} path="/sales/by-product"/>
						<Route element={<ByCategories />} path="/sales/by-categories"/>
					</Routes>
				</MainLayoutContainer>
			</div>
		</BrowserRouter>
	);
}
