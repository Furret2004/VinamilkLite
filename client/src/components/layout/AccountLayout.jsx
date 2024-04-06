import PropTypes from 'prop-types';
import { Header, Footer } from '../common';

function AccountLayout({ children }) {
  return (
    <div className="min-h-screen">
      <Header />
      {children}
      <Footer />
    </div>
  );
}

AccountLayout.propTypes = {
  children: PropTypes.node.isRequired,
};

export default AccountLayout;
