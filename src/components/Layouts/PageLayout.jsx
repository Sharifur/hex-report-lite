import Sidebar from "../Dashboard/Sidebar.jsx";
import ContentArea from "../Dashboard/ContentArea.jsx";
import HelpToastr from "../HelpToastr.jsx";
import {SidebarProvider} from "../../context/SidebarContext.jsx";

export default function PageLayout({children,pageTitle,helpToastr}){
    return (
        <SidebarProvider>
            <div className="LayoutContainer">
                <Sidebar />
                <ContentArea pageTitle={pageTitle}>
                    {children}
                    <HelpToastr text="Need a Help ?" anchorText="Contact with Us" link="https://xgenious.com"/>
                </ContentArea>
            </div>
        </SidebarProvider>
    )
}
