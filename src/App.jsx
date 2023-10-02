import MainLayoutContainer from "./components/Dashboard/MainLayoutContainer";
import {BrowserRouter, Route, Routes} from "react-router-dom";
import "./assets/scss/main.scss";
import "line-awesome/dist/line-awesome/css/line-awesome.min.css";
export default function App() {
	const windowLocation = window.location.pathname;
	const windowParams = window.location.search;
	// <Sidebar searchParam={windowParams} />

	// Any .tsx or .jsx files in /pages will become a route
	// See documentation for <Routes /> for more info
	// const pages = import.meta.globEager("./pages/**/!(*.test.[jt]sx)*.([jt]sx)");
	// const { t } = useTranslation();

	return (
		<BrowserRouter basename={windowLocation}>
			<div className="reportGenixMainArea">
				{/*<Sidebar searchParam={windowParams} />*/}
				<MainLayoutContainer>
					<Routes>
						{/*<Route element={<Dashboard/>} path="/"/>*/}
						{/*<Route element={<StoreCredit/>} path="/store-credit"/>*/}
						{/*<Route element={<Coupon/>} path="/coupon"/>*/}
						{/*/!* <Route element={<LoyaltyProgramme /> } path="/loyalty-programme" /> *!/*/}
						{/*/!* <Route element={<GiftCards /> } path="/gift-cards" /> *!/*/}
						{/*/!* <Route element={<Automations /> } path="/automations" /> *!/*/}

						{/*/!* hex coupon inner link  *!/*/}
						{/*<Route element={<GrantCoupon/>} path="/grant-coupon"/>*/}
						{/*<Route element={<CouponSettings/>} path="/coupon-settings"/>*/}
					</Routes>
				</MainLayoutContainer>
			</div>
		</BrowserRouter>
	);
}

