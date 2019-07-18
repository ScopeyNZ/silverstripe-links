import React, { Component } from 'react';
import {
  Dropdown, DropdownMenu, DropdownToggle, DropdownItem,
  Modal, ModalHeader, ModalBody,
} from 'reactstrap';

class LinkField extends Component {
  constructor(props) {
    super(props);

    this.state = {
      addMenuOpen: false,
      modalOpen: false,
      linkType: '',
    };

    this.handleToggleAddMenu = this.handleToggleAddMenu.bind(this);
    this.handleToggleModal = this.handleToggleModal.bind(this);
  }

  handleToggleAddMenu(event) {
    this.setState(state => ({
      addMenuOpen: !state.addMenuOpen,
    }));
  }

  handleToggleModal() {
    this.setState(state => ({
      modalOpen: !state.modalOpen,
    }));
  }

  renderAddMenu() {
    return (
      <DropdownMenu className="link-field__dropdown">
        <DropdownItem onClick={this.handleToggleModal}>Page on this site</DropdownItem>
        <DropdownItem>Link to file</DropdownItem>
        <DropdownItem>Link to external URL</DropdownItem>
        <DropdownItem>Link to email address</DropdownItem>
      </DropdownMenu>
    );
  }

  renderClearButton() {
    return (
      <button className="link-field__clear-control">
        Clear
      </button>
    );
  }

  renderModal() {
    const { modalOpen } = this.state;

    return (
      <Modal
        isOpen={modalOpen}
        toggle={this.handleToggleModal}
        backdrop={false}
      >
        <ModalHeader toggle={this.handleToggleModal}>Page on this site</ModalHeader>
        <ModalBody>
          Test 123
        </ModalBody>
      </Modal>
    )
  }

  render() {
    const { addMenuOpen } = this.state;

    return (
      <Dropdown
        className="link-field"
        isOpen={addMenuOpen}
        toggle={this.handleToggleAddMenu}
      >
        <DropdownToggle
          tag="div"
          className="link-field__content"
          aria-expanded={addMenuOpen}
        >
          <i className="font-icon-link link-field__icon" />
          <div className="link-field-toggle">
            <span className="link-field-toggle__text">Add link</span>
            <i className="link-field-toggle__icon font-icon-caret-down-two" />
          </div>
        </DropdownToggle>
        {this.renderClearButton()}
        {this.renderAddMenu()}
        {this.renderModal()}
      </Dropdown>
    );
  }
}

export default LinkField;
