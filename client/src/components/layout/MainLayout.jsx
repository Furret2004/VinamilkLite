import PropTypes from 'prop-types';
import { Header, Footer } from '../common';

function MainLayout({ children, hasTransitionHeader = false }) {
  return (
    <div className="min-h-screen">
      <Header hasTransiton={hasTransitionHeader} />
      {children}
      <Footer />
    </div>
  );
}

MainLayout.propTypes = {
  children: PropTypes.node.isRequired,
  hasTransitionHeader: PropTypes.bool,
};

export default MainLayout;
