// import { useTranslation, Trans } from "react-i18next";
import "../assets/scss/main.scss";
// import "line-awesome/dist/line-awesome/css/line-awesome.min.css";

import MainLayoutContainer from "../components/Dashboard/MainLayoutContainer.jsx";

export default function HomePage() {
  const { t } = useTranslation();
  return (
    <div className="reportGenixMainArea">
		<MainLayoutContainer/>
    </div>
  );
}
